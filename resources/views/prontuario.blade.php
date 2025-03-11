@php
    use Carbon\Carbon;
    use App\Models\Consulta;
    use App\Models\Exame;
    use Illuminate\Support\Facades\DB;
    use App\Models\Prontuario;
    use App\Models\Prescricao;
    use App\Models\Diagnostico;

    if (Auth::user()->tipo == 'paciente') {
        $cpf = Auth::user()->cpf;
    } else {
        $cpf = Prontuario::find($id)->cpf;
    }

    // Consulta de exames
    $exames = Exame::where('idProntuario', $id)->select([
        'tipo as descricao',
        'idAgendamento as key',
        'resultado as info',
        'idExame as idUnico',
        'created_at',
        'updated_at',
    ]);

    // Consulta de consultas com CPF do paciente autenticado
    $consultas = Consulta::where('cpf', $cpf)->select(
        DB::raw("'Consulta' as descricao"),
        'idAgendamento as key',
        'motivo as info',
        'idConsulta as idUnico',
        'created_at',
        'updated_at',
    );

    // União das duas consultas
    $unionQuery = $exames->union($consultas);

    // Transformando o resultado do union em uma subconsulta
    $data = DB::table(DB::raw("({$unionQuery->toSql()}) as subquery"))
        ->mergeBindings($unionQuery->getQuery()) // Corrige bindings do union
        ->join('agendamentos', 'subquery.key', '=', 'agendamentos.idAgendamento') // Faz o join com agendamentos
        ->orderByDesc('data') //    ->where('data', '<', now())
        ->get();

    //    dd($data);

@endphp


<x-layout>
    <x-slot:heading>
        Prontuário
    </x-slot:heading>

    <div class="container">
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $row->descricao }}</td>
                            <td>{{ Carbon::parse($row->data)->format('d/m/Y') }}</td>
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal" color="info"
                                    data-bs-target="#detalhesModal{{ $row->key }}"> Ver Detalhes</button>

                            </td>
                        </tr>

                        <x-modal id="detalhesModal{{ $row->key }}" title="Detalhes">
                            <h3>{{ $row->descricao }} - {{ Carbon::parse($row->data)->format('d/m/Y') }}</h3>
                            <div class="mb-3">
                                @if ($row->descricao != 'Consulta')
                                    <h2>Resultado do exame:
                                    @if ($row->info != null)
                                            Pronto
                                        </h2>
                                        <p>{{ Storage::url(DB::table('files')->where('idArquivo', $row->info)->first()->name) }}<p>
                                        <a href="{{ Storage::url(DB::table('files')->where('idArquivo', $row->info)->get('path')->first()->path) }}"
                                        target="_blank">
                                        <button class="btn"><i class="fa fa-download"></i>Baixar Resultado</button>
                                        </a>
                                    @else
                                        Indisponível</h2>
                                    @endif

                                    @if (Diagnostico::where('idExame', $row->idUnico)->first() != null)
                                     <h2>Diagnóstico:</h2>
                                    <label>{{ Diagnostico::where('idExame', $row->idUnico)->first()->descricao }}</label>
                                    @endif
                                @endif

                                @if ($row->descricao == 'Consulta')
                                    <label class="mb-2">{{ $row->info }}</label>
                                    <div class="mt-3">
                                        <h2>Prescrições da consulta</h2>
                                        <ul>
                                            @foreach (Prescricao::where('idConsulta', $row->idUnico)->get() as $item)
                                                <li> {{ $item->nomeMedicamento }}, {{ $item->dosagem }} até
                                                    {{ $item->data }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </x-modal>
        @endforeach
        </x-slot:rows>
        </x-table>
    </div>
    </div>
</x-layout>

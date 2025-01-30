@php
    use Carbon\Carbon;
    use App\Models\Consulta;
    use App\Models\Exame;
    use Illuminate\Support\Facades\DB;
    use App\Models\Prontuario;

    if (Auth::user()->tipo == 'paciente'){
        $cpf = Auth::user()->cpf;
    } else {
        $cpf = Prontuario::find($id)->cpf;
    }

    // Consulta de exames
    $exames = Exame::where('idProntuario', $id)->select([
        'tipo as descricao',
        'idAgendamento as key',
        'resultado as info',
    ]);

    // Consulta de consultas com CPF do paciente autenticado
    $consultas = Consulta::where('cpf', $cpf)->select(
        DB::raw("'Consulta' as descricao"),
        'idAgendamento as key',
        'motivo as info',
    );

    // União das duas consultas
    $unionQuery = $exames->union($consultas);

    // Transformando o resultado do union em uma subconsulta
    $data = DB::table(DB::raw("({$unionQuery->toSql()}) as subquery"))
        ->mergeBindings($unionQuery->getQuery()) // Corrige bindings do union
        ->join('agendamentos', 'subquery.key', '=', 'agendamentos.idAgendamento') // Faz o join com agendamentos
        ->orderByDesc('data') //    ->where('data', '<', now())
        ->get();

    //dd($data);
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

                        <x-modal id="detalhesModal{{ $row->key }}" title="Escolha uma nova data">
                            <h3>{{ $row->descricao }} - {{ Carbon::parse($row->data)->format('d/m/Y') }}</h3>
                            <div class="mb-3">
                                <label class="mb-2">{{ $row->info }}</label>
                                <?php if($row->descricao != 'Consulta'){
                                    echo "<h2>Resultado do exame: ";

                                    if($row->updated_at != $row->created_at){
                                        echo "Pronto";
                                    }else{
                                        echo "Indisponível";
                                    }
                                    echo "</h2>";
                                };
                                ?></h2>
                            </div>
                        </x-modal>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

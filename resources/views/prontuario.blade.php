@php
use Carbon\Carbon;
use App\Models\Consulta;
use App\Models\Exame;
use Illuminate\Support\Facades\DB;

// Consulta de exames
$exames = Exame::where('idProntuario', $id)
    ->select(['tipo as descricao', 'idAgendamento as key']);

// Consulta de consultas com CPF do paciente autenticado
$consultas = Consulta::where('cpf', Auth::user()->paciente->cpf)
    ->select(DB::raw("'Consulta' as descricao"), 'idAgendamento as key');

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
                            <td>{{$row->descricao}}</td>
                            <td>{{ Carbon::parse($row->data)->format('d/m/Y') }}</td>
                            <td>
                                <x-action-button href="#" color="info">Ver Mais</x-action-button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

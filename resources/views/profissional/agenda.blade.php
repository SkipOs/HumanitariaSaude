@php
    use App\Models\Instituicao;
    use Carbon\Carbon;
    $data = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('pacientes as pa', 'consultas.cpf', 'pa.cpf')
        ->join('usuarios as u', 'pa.idUsuario', 'u.idUsuario')
        ->where('crm', Auth::user()->profissionalSaude->crm)
        ->where('data', '>=', now())
        ->select(['*'])
        ->orderBy('data', 'ASC')
        ->get();

    //dd($data);
    //        ->where('data', operator: '<', strtotime("tomorrow"))

@endphp

<x-layout>
    <x-slot:heading>
        Consultas Hoje
    </x-slot:heading>

    <div class="container mt-4">
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Paciente</th>
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ Carbon::parse($row->data)->format('d/m/Y') }}</td>
                            <td>{{ Carbon::parse($row->data)->format('H:i') }}</td>
                            <td>{{ $row->nome }}</td>
                            <td>
                                <form action="/consulta/{{ $row->idConsulta }}" method="GET" class="d-inline">
                                    <button class="btn btn-success">Iniciar Consulta</button>
                                </form>

                                <form action="/pep/cancelar/{{ $row->idAgendamento }}" method="DELETE" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Cancelar Consulta</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

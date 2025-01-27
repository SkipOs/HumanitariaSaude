@php
use Carbon\Carbon;
    $data = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('profissional_saudes as p', 'consultas.crm', 'p.crm')
        ->join('usuarios as u', 'p.idUsuario', 'u.idUsuario')
        ->where('cpf', Auth::user()->paciente->cpf)
        ->where('data', '<', now())
        ->select(['data', 'nome', 'especialidade'])
        ->get();

    //dd($data);
@endphp

<x-layout>
    <x-slot:heading>
        Próximas Consultas
    </x-slot:heading>

    <div class="container">
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Médico</th>
                    <th>Especialidade</th>
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ Carbon::parse($row->data)->format('d/m/Y') }}</td>
                            <td>{{ Carbon::parse($row->data)->format('H:i') }}</td>
                            <td>{{$row->nome}}</td>
                            <td>{{$row->especialidade}}</td>
                            <td>
                                <x-action-button href="#" color="info">Ver Detalhes</x-action-button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

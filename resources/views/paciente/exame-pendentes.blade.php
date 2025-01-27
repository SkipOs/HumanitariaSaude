@php
use Carbon\Carbon;
    $data = DB::table('exames')
            ->join('agendamentos', 'exames.idAgendamento','agendamentos.idAgendamento')
            ->join('prontuarios', 'exames.idProntuario','prontuarios.idProntuario')
            ->where('cpf', Auth::user()->paciente->cpf)
            ->where('data', '>=', now())
            ->select(['tipo', 'data'])
            ->get();

    //dd($data);
@endphp


<x-layout>
    <x-slot:heading>
        Exames Pendentes
    </x-slot:heading>

    <div class="container">
        <div class="card">
            <x-table>
                <x-slot:headers>
                    <th>Tipo</th>
                    <th>Data</th>
                    <th>Hora</th>
                    <th>Ações</th>
                </x-slot:headers>
                <x-slot:rows>
                    @foreach ($data as $row)
                        <tr>
                            <td>{{$row->tipo}}</td>
                            <td>{{ Carbon::parse($row->data)->format('d/m/Y') }}</td>
                            <td>{{ Carbon::parse($row->data)->format('H:i') }}</td>
                            <td>
                                <x-action-button href="#" color="info">Trocar Data</x-action-button>
                                <form action="#" method="POST" class="d-inline">
                                    @csrf
                                    <button class="btn btn-danger">Cancelar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

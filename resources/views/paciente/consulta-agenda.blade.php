@php
use Carbon\Carbon;
    $data = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('profissional_saudes as p', 'consultas.crm', 'p.crm')
        ->join('usuarios as u', 'p.idUsuario', 'u.idUsuario')
        ->where('cpf', Auth::user()->paciente->cpf)
        ->where('data', '>=', now())
        ->select(['data', 'nome', 'especialidade', 'consultas.idAgendamento as idAgendamento'])
        ->orderBy('data', 'ASC')
        ->get();

    //dd($data);
@endphp

<x-layout>
    <x-slot:heading>
        Próximas Consultas
    </x-slot:heading>

    <div class="container mt-4">
<x-alert-message></x-alert-message>

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
                                <!-- Botão para abrir o modal -->
                                <button class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#changeDataModal{{ $row->idAgendamento }}">
                                    Trocar Data
                                </button>
                                <form action="/pep/cancelar/{{ $row->idAgendamento }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Cancelar</button>
                                </form>
                            </td>
                        </tr>

                        <x-modal id="changeDataModal{{ $row->idAgendamento }}" title="Escolha uma nova data">
                            <form method="POST" action="/pep/update">
                                @csrf
                                <input type="hidden" name="idAgendamento" id="idAgendamento"
                                    value="{{ $row->idAgendamento }}">
                                <div class="mb-3">
                                    <label for="newDate" class="form-label">Nova Data</label>
                                    <input type="datetime-local" id="newDate" name="newDate"
                                        class="form-control timedate" value="{{ $row->data }}" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Confirmar</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </form>
                        </x-modal>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

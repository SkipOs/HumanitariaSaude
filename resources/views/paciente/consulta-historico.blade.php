@php
    use App\Models\Instituicao;
    use Carbon\Carbon;
    $data = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('profissional_saudes as p', 'consultas.crm', 'p.crm')
        ->join('usuarios as u', 'p.idUsuario', 'u.idUsuario')
        ->where('cpf', Auth::user()->paciente->cpf)
        ->where('data', '<', now())
        ->select(['*'])
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
                            <td>{{ $row->nome }}</td>
                            <td>{{ $row->especialidade }}</td>
                            <td>
                                <button type="button" class="btn" data-bs-toggle="modal" color="info"
                                    data-bs-target="#detalhesModal{{ $row->idConsulta }}"> Ver Detalhes</button>

                            </td>
                        </tr>

                        <x-modal id="detalhesModal{{ $row->idConsulta }}" title="Escolha uma nova data">
                            <h3>Consulta realizada em {{ Carbon::parse($row->data)->format('d/m/Y') }}</h3>
                            <div class="mb-3">
                                <x-input type="text" class="form-control" value="{{ $row->nome }}"
                                    readonly>Profissional</x-input>
                                <x-input type="text" class="form-control" value="{{ $row->motivo }}" readonly>Motivo
                                    da Consulta</x-input>
                                <x-input type="text" class="form-control"
                                    value="{{ Instituicao::find($row->idInstituicao)->nome }}" readonly><label>Local da
                                        consulta</label></x-input>
                                <label>{{ Instituicao::find($row->idInstituicao)->endereco }}</label>
                            </div>
                        </x-modal>
                    @endforeach
                </x-slot:rows>
            </x-table>
        </div>
    </div>
</x-layout>

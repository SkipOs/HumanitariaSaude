@php
    use App\Models\Instituicao;
    use Carbon\Carbon;
    $data = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('pacientes as pa', 'consultas.cpf', 'pa.cpf')
        ->join('usuarios as u', 'pa.idUsuario', 'u.idUsuario')
        ->where('crm', Auth::user()->profissionalSaude->crm)
        ->where('data', '<', now())
        ->select(['*'])
        ->orderBy('data', 'DESC')
        ->get();

    //dd($data);

@endphp

<x-layout>
    <x-slot:heading>
        Pacientes Atendidos
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
                            <button type="button" class="btn" data-bs-toggle="modal" color="info"
                            data-bs-target="#detalhesModal{{ $row->idConsulta }}"> Ver Detalhes</button>
                    </td>
                </tr>

                <x-modal id="detalhesModal{{ $row->idConsulta }}" title="Consulta realizada em {{ Carbon::parse($row->data)->format('d/m/Y') }}">
                    <div class="mb-3">
                        <x-input type="text" class="form-control" value="{{ $row->nome }}"
                            readonly>Paciente</x-input>
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

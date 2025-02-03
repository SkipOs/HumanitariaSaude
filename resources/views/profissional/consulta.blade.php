@php
    use App\Models\Consulta;
    use App\Models\Exame;
    use App\Models\Prontuario;
    use Carbon\Carbon;
    use App\Models\Diagnostico;

    $consulta = Consulta::find($id);
    $prontuario = Prontuario::where('cpf', $consulta->cpf)->get();

    $exames = Exame::where('idProntuario', $prontuario[0]->idProntuario)->get();

    $exames = DB::table('exames')
        ->join('agendamentos', 'exames.idAgendamento', 'agendamentos.idAgendamento')
        ->where('idProntuario', $prontuario[0]->idProntuario)
        ->select([
            'tipo',
            'data',
            'exames.idExame as idExame',
            'resultado',
            'exames.created_at as created_at',
            'exames.updated_at as updated_at',
        ])
        ->orderBy('data', 'DESC')
        ->get();

    //$diagnóstico = Diagnostico::where('idExame', 2)->get();
    //dd($diagnóstico);

@endphp

<x-clear-page>
    <x-alert-message></x-alert-message>
    <div class="container mt-4">
        <div class="card">
            <div class="card-body">
                <form action="/encerrar/{{ $id }}" method="post">
                    @csrf
                    @method('POST')
                    <h1>Consulta com {{ $consulta->paciente->usuario->nome }}</h1>

                    <div class="mb-3">
                        <label class="form-label">Motivo Consulta</label>
                        <input type="text" class="form-control" name="motivo" id="motivo"
                            placeholder="Motivo da consulta" value="{{ $consulta->motivo }}">
                    </div>

                    <div class="mb-3">
                        <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button"
                            aria-controls="offcanvasEnd">
                            Visualizar Exames
                        </a>
                    </div>

                    <div class="mb-3">
                        <a href="#" class="btn btn-2" data-bs-toggle="modal" data-bs-target="#modal-report">
                            Adicionar medicamento
                        </a>
                    </div>

                    <div class="mb-3">
                        <x-button type="submit" class="btn btn-primary">Encerrar Consulta</x-button>
                    </div>
                </form>
            </div>
        </div>

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEnd" aria-labelledby="offcanvasEndLabel"
            aria-modal="true" role="dialog">
            <div class="offcanvas-header">
                <h2 class="offcanvas-title" id="offcanvasEndLabel">Exames</h2>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="accordion" id="accordion-example">
                @foreach ($exames as $exame)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading-1">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse-{{ $exame->idExame }}" aria-expanded="true">
                                {{ $exame->tipo }} - {{ Carbon::parse($exame->data)->format('d/m/Y') }}
                            </button>
                        </h2>
                        <div id="collapse-{{ $exame->idExame }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordion-example" style="">
                            <div class="accordion-body pt-0">
                                @if ($exame->updated_at != $exame->created_at)
                                    <h2>Resultado do exame: Pronto</h2>
                                    <label class="mb-2">{{ $exame->resultado }}</label>
                                    @if (Diagnostico::where('idExame', $exame->idExame)->first() == null)
                                        <div class="mt-3"> <a href="#" class="btn btn-2" data-bs-toggle="modal"
                                                data-bs-target="#modal-diagnóstico-{{ $exame->idExame }}">
                                                Diagnosticar
                                            </a></div>
                                    @elseif (Diagnostico::where('idExame', $exame->idExame)->first() != null)
                                        <h2>Diagnóstico:</h2>
                                        <label>{{ Diagnostico::where('idExame', $exame->idExame)->first()->descricao }}</label>
                                    @endif
                                @elseif ($exame->updated_at == $exame->created_at)
                                    <h2>Resultado do exame: Indisponível</h2>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-clear-page>
@foreach ($exames as $exame)
    @if (Diagnostico::where('idExame', $exame->idExame)->first() == null)
        <div class="modal modal-blur fade" id="modal-diagnóstico-{{ $exame->idExame }}" tabindex="-1"
            style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form action="/diagnosticar/{{ $exame->idExame }}" method="post">
                        @csrf
                        @method('POST')
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <Header>Exame - {{ $exame->tipo }}</Header>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Resultado Exame</label>
                                <span>{{ $exame->resultado }}</span>
                            </div>
                            <div class="col-lg-12">
                                <label class="form-label">Diagnóstico</label>
                                <textarea class="form-control" rows="3" id="descricao" name="descricao" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal">
                                Cancel
                            </a>
                            <x-button type="submit" class="btn btn-primary">Adicionar Diagnostico</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endforeach

<div class="modal modal-blur fade" id="modal-report" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Nova prescricao</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/prescricao/{{ $id }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nome do medicamento</label>
                        <input type="text" class="form-control" name="nomeMedicamento" id="nomeMedicamento">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Dosagem</label>
                        <textarea class="form-control" rows="3" id="dosagem" name="dosagem" required></textarea>
                    </div>

                    <x-input tabler="mb-3" name="vencimento" type="date" class="form-control datetime"
                        placeholder="__ /__ /____" min="{{ Carbon::now()->format('Y-m-d') }}"
                        required>Vencimento</x-input>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary btn-3" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <x-button type="submit" class="btn btn-primary">Adicionar Remédio</x-button>
                </div>
            </form>
        </div>
    </div>
</div>

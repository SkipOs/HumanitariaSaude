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
    <div class="container mt-4">
        <div class="card">
            <h1>Consulta com {{ $consulta->paciente->usuario->nome }}</h1>

            <div class="mb-3">
                <label class="form-label">Motivo Consulta</label>
                <input type="text" class="form-control" name="example-text-input" placeholder="Your report name">
            </div>

            <a class="btn" data-bs-toggle="offcanvas" href="#offcanvasEnd" role="button" aria-controls="offcanvasEnd">
                Visualizar Exames
            </a>

            <a class="btn" data-bs-toggle="modal" href="#" role="button" aria-controls="">
                Nova Prescrição
            </a>

            <a class="btn" data-bs-toggle="modal" href="#" role="button" aria-controls="">
                Renovar Prescrição
            </a>
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
                                        <a href="#" class="btn btn-2" data-bs-toggle="modal"
                                            data-bs-target="#modal-diagnóstico-{{ $exame->idExame }}">
                                            Diagnosticar
                                        </a>
                                    @elseif (Diagnostico::where('idExame', $exame->idExame)->first() != null)
                                        <label>{{ Diagnostico::where('idExame', $exame->idExame)->descricao }}</label>
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
                    <form  action="/diagnosticar" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title">
                            <Header>Exame - {{ $exame->tipo }}</Header>
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Resultado Exame</label>
                            <span>{{ $exame->resultado }}</span>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Diagnóstico</label>
                                <textarea class="form-control" rows="3" id="descricao"></textarea>
                            </div>
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

@php
    use Carbon\Carbon;
    use App\Models\Instituicao;
    use App\Models\ProfissionalSaude;
@endphp

<x-layout>
    <x-slot:heading>
        Solicitar Agendamento
    </x-slot:heading>

    <x-alert-message></x-alert-message>

    <div class="container mt-4 justify-content-center col-lg-6" style="display:flex">
        <div class="card">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs" data-bs-toggle="tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-home-3" class="nav-link" data-bs-toggle="tab" aria-selected="false" role="tab"
                            tabindex="-1">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/home -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-heart-rate-monitor icon me-1 icon-3">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M3 4m0 1a1 1 0 0 1 1 -1h16a1 1 0 0 1 1 1v10a1 1 0 0 1 -1 1h-16a1 1 0 0 1 -1 -1z" />
                                <path d="M7 20h10" />
                                <path d="M9 16v4" />
                                <path d="M15 16v4" />
                                <path d="M7 10h2l2 3l2 -6l1 3h3" />
                            </svg> Exame</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#tabs-profile-3" class="nav-link active" data-bs-toggle="tab" aria-selected="true"
                            role="tab">
                            <!-- Download SVG icon from http://tabler.io/icons/icon/user -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report-medical icon me-1 icon-3">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M10 14l4 0" />
                                <path d="M12 12l0 4" />
                            </svg>
                            Consulta</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane" id="tabs-home-3" role="tabpanel">
                    <x-form action="/exame/new" method="POST">
                        <x-slot:title>
                        </x-slot:title>
                        <x-input tabler="mb-3" name="dataAgendamento" type="date" class="form-control datetime"
                            placeholder="__ /__ /____" min="{{ Carbon::now()->format('Y-m-d') }}"
                            required>Data</x-input>
                        <x-input tabler="mb-3" name="horaAgendamento" type="time" class="form-control datetime"
                            placeholder="__:__" min="06:00" max="17:00" step="1800" required>Horário</x-input>

                        <div id="examesSelect" class="mb-3">
                            <label class="form-label">Selecione o exame</label>
                            <select class="form-select" id="selectExames" name="tipoExame">
                                <option value="sangue">Exame de Sangue</option>
                                <option value="urina">Exame de Urina</option>
                                <option value="raiox">Raio-X</option>
                                <option value="ultrassom">Ultrassom</option>
                            </select>
                        </div>

                        <x-slot:actions>
                            <x-button type="submit" class="btn btn-primary">Marcar</x-button>
                        </x-slot:actions>
                        <x-slot:bottomtext></x-slot:bottomtext>
                    </x-form>
                </div>

                <div class="tab-pane active show" id="tabs-profile-3" role="tabpanel">
                    <x-form action="/consulta/new" method="POST">
                        <x-slot:title></x-slot:title>

                        <x-input tabler="mb-3" name="dataAgendamento" type="date" class="form-control datetime"
                            placeholder="__ /__ /____" min="{{ Carbon::now()->format('Y-m-d') }}"
                            required>Data</x-input>
                        <x-input tabler="mb-3" name="horaAgendamento" type="time" class="form-control datetime"
                            placeholder="__:__" min="06:00" max="17:00" step="1800" required>Horário</x-input>

                        <div id="localSelect" class="mb-3">
                            <label class="form-label">Selecione o local</label>
                            <select class="form-select" id="idLocal" name="idLocal">
                                @foreach (Instituicao::get() as $instituicao)
                                    <option value="{{ $instituicao->idInstituicao }}">{{ $instituicao->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="profissionalSelect" class="mb-3">
                            <label class="form-label">Selecione o Médico</label>
                            <select class="form-select" id="idProfissional" name="idProfissional">
                                @foreach (ProfissionalSaude::get() as $profissional)
                                    <option value="{{ $profissional->crm }}">{{ $profissional->usuario->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <x-slot:actions>
                            <x-button type="submit" class="btn btn-primary">Marcar</x-button>
                        </x-slot:actions>
                        <x-slot:bottomtext></x-slot:bottomtext>
                    </x-form>
                </div>
            </div>
        </div>
    </div>
</x-layout>

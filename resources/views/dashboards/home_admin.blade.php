@php
use App\Models\Paciente;
use App\Models\Administrador;
use App\Models\Instituicao;
use App\Models\ProfissionalSaude;
use App\Models\Consulta;
use App\Models\Exame;

@endphp

<x-layout>
    <x-slot:heading>
        Dashboard do Admin
    </x-slot:heading>

    <div class="container mt-4">
        <div class="row g-3">
            <!-- Pacientes Cadastrados -->
            <div class="col-md-4">
                <a href="/ag/pacientes">
                    <x-card>
                        <span class="text-secondary">{{Paciente::count();}}</span>
                        <x-slot:title>Pacientes</x-slot:title>
                        <x-slot:subtitle>Gerenciamento no painel de pacientes</x-slot:subtitle>
                        <x-slot:bgColor>bg-azure</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-users">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                        </x-slot:icon>

                    </x-card>
                </a>
            </div>

            <!-- Admins Cadastrados -->
            <div class="col-md-4">
                <a href="/ag/administrador">
                    <x-card>
                        <span class="text-secondary">{{Administrador::count();}}</span>
                        <x-slot:title>Admins</x-slot:title>
                        <x-slot:subtitle>Gerenciamento no painel de admins</x-slot:subtitle>
                        <x-slot:bgColor>bg-orange</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-flag-cog">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M12.901 14.702a5.014 5.014 0 0 1 -.901 -.702a5 5 0 0 0 -7 0v-9a5 5 0 0 1 7 0a5 5 0 0 0 7 0v6.5" />
                                <path d="M5 21v-7" />
                                <path d="M19.001 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                                <path d="M19.001 15.5v1.5" />
                                <path d="M19.001 21v1.5" />
                                <path d="M22.032 17.25l-1.299 .75" />
                                <path d="M17.27 20l-1.3 .75" />
                                <path d="M15.97 17.25l1.3 .75" />
                                <path d="M20.733 20l1.3 .75" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Profissionais Cadastrados -->
            <div class="col-md-4">
                <a href="/ag/profissional_saudes">
                    <x-card>
                        <span class="text-secondary">{{ProfissionalSaude::count();}}</span>
                        <x-slot:title>Profissionais</x-slot:title>
                        <x-slot:subtitle>Gerenciamento no painel de admins</x-slot:subtitle>
                        <x-slot:bgColor>bg-red</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-stethoscope">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1" />
                                <path d="M8 15a6 6 0 1 0 12 0v-3" />
                                <path d="M11 3v2" />
                                <path d="M6 3v2" />
                                <path d="M20 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Instituições Cadastrados -->
            <div class="col-md-4">
                <a href="/ag/instituicaos">
                    <x-card>
                        <span class="text-secondary">{{Instituicao::count();}}</span>
                        <x-slot:title>Instituições</x-slot:title>
                        <x-slot:subtitle>Gerenciamento de Instituições</x-slot:subtitle>
                        <x-slot:bgColor>bg-green</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-building-hospital">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M3 21l18 0" />
                                <path d="M5 21v-16a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v16" />
                                <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" />
                                <path d="M10 9l4 0" />
                                <path d="M12 7l0 4" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Consultas Realizadas -->
            <div class="col-md-4">
                <a href="/ag/consultas">
                    <x-card>
                        <span class="text-secondary">{{Consulta::count();}}</span>
                        <x-slot:title>Consultas Realizadas</x-slot:title>
                        <x-slot:subtitle>Consultas registradas até o momento</x-slot:subtitle>
                        <x-slot:bgColor>bg-teal</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-report-medical">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2" />
                                <path
                                    d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z" />
                                <path d="M10 14l4 0" />
                                <path d="M12 12l0 4" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Exames Realizados -->
            <div class="col-md-4">
                <a href="/ag/exames">
                    <x-card>
                        <span class="text-secondary">{{Exame::count();}}</span>
                        <x-slot:title>Exames Realizados</x-slot:title>
                        <x-slot:subtitle>Exames registrados no sistema</x-slot:subtitle>
                        <x-slot:bgColor>bg-yellow</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-flask-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M6.1 15h11.8" />
                                <path d="M14 3v7.342a6 6 0 0 1 1.318 10.658h-6.635a6 6 0 0 1 1.317 -10.66v-7.34h4z" />
                                <path d="M9 3h6" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

        </div>
    </div>
</x-layout>

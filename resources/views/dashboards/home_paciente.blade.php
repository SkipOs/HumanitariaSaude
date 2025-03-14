@php
    //Proximas consultas
    $pc = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('instituicaos', 'consultas.idInstituicao', 'instituicaos.idInstituicao')
        ->where('cpf', $paciente['cpf'])
        ->where('data', '>=', now())
        ->select(['data'])
        ->count();

    // Exames Pendentes
    $pe = DB::table('exames')
        ->join('agendamentos', 'exames.idAgendamento', 'agendamentos.idAgendamento')
        ->join('prontuarios', 'exames.idProntuario', 'prontuarios.idProntuario')
        ->where('cpf', $paciente['cpf'])
        ->where('data', '>=', now())
        ->select(['cpf', 'data', 'exames.idAgendamento'])
        ->count();

    // Historico Consultas
    $hc = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('instituicaos', 'consultas.idInstituicao', 'instituicaos.idInstituicao')
        ->where('cpf', $paciente['cpf'])
        ->where('data', '<', now())
        ->select(['data'])
        ->count();
@endphp

<x-layout>
    <x-slot:heading>
        Dashboard do Paciente
    </x-slot:heading>

    <div class="container mt-4">
        <div class="row g-3">
            <!-- Próximas Consultas -->
            <div class="col-md-4">
                <a href="/pca">
                    <x-card>
                        <span class="text-secondary">{{ $pc }}</span>
                        <x-slot:title>Próximas Consultas</x-slot:title>
                        <x-slot:subtitle>Ver agenda para detalhes</x-slot:subtitle>
                        <x-slot:bgColor>bg-teal</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M7 14h.013" />
                                <path d="M10.01 14h.005" />
                                <path d="M13.01 14h.005" />
                                <path d="M16.015 14h.005" />
                                <path d="M13.015 17h.005" />
                                <path d="M7.01 17h.005" />
                                <path d="M10.01 17h.005" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Exames Pendentes -->
            <div class="col-md-4">
                <a href="/pep">
                    <x-card>
                        <span class="text-secondary">{{ $pe }}</span>
                        <x-slot:title>Exames Pendentes</x-slot:title>
                        <x-slot:subtitle>Confira exames agendados</x-slot:subtitle>
                        <x-slot:bgColor>bg-red</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-test-pipe-2">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M15 3v15a3 3 0 0 1 -6 0v-15" />
                                <path d="M9 12h6" />
                                <path d="M8 3h8" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Histórico de Consultas -->
            <div class="col-md-4">
                <a href="/pch">
                    <x-card>
                        <span class="text-secondary">{{ $hc }}</span>
                        <x-slot:title>Histórico de Consultas</x-slot:title>
                        <x-slot:subtitle>Veja suas consultas realizadas</x-slot:subtitle>
                        <x-slot:bgColor>bg-green</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-check">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M11.5 21h-5.5a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v6" />
                                <path d="M16 3v4" />
                                <path d="M8 3v4" />
                                <path d="M4 11h16" />
                                <path d="M15 19l2 2l4 -4" />
                            </svg>
                        </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Solicitar Agendamento -->
            <div class="col-md-4">
                <a href="/pa">
                    <x-card :counter="false">
                        <span class="text-secondary"></span>
                        <x-slot:title>Solicitar Agendamento</x-slot:title>
                        <x-slot:subtitle>Solicite o agendamento de <br>consultas e Exames</x-slot:subtitle>
                        <x-slot:bgColor>bg-purple</x-slot:bgColor>
                        <x-slot:icon>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-time">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
                                <path d="M18 18m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                                <path d="M15 3v4" />
                                <path d="M7 3v4" />
                                <path d="M3 11h16" />
                                <path d="M18 16.496v1.504l1 1" />
                            </svg> </x-slot:icon>
                    </x-card>
                </a>
            </div>
        </div>
    </div>
</x-layout>

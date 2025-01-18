@php
    $pl = 'null';
@endphp

<x-layout>
    <x-slot:heading>
        Dashboard do Profissional de Saúde
    </x-slot:heading>

    <div class="container mt-4">
        <div class="row g-3">
            <!-- Consultas Agendadas -->
            <div class="col-md-4">
                <a href="/psa">
                    <x-card>
                        <span class="text-secondary">{{$pl}}</span>
                        <x-slot:title>Consultas Agendadas</x-slot:title>
                        <x-slot:subtitle>Consulte sua agenda</x-slot:subtitle>
                        <x-slot:bgColor>bg-teal</x-slot:bgColor>
                        <x-slot:icon>
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-calendar-week"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12z" /><path d="M16 3v4" /><path d="M8 3v4" /><path d="M4 11h16" /><path d="M7 14h.013" /><path d="M10.01 14h.005" /><path d="M13.01 14h.005" /><path d="M16.015 14h.005" /><path d="M13.015 17h.005" /><path d="M7.01 17h.005" /><path d="M10.01 17h.005" /></svg>                        </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Pacientes Atendidos -->
            <div class="col-md-4">
                <a href="#">
                    <x-card>
                        <span class="text-secondary">{{$pl}}</span>
                        <x-slot:title>Pacientes Atendidos</x-slot:title>
                        <x-slot:subtitle>Visualize histórico de atendimentos</x-slot:subtitle>
                        <x-slot:bgColor>bg-azure</x-slot:bgColor>
                        <x-slot:icon>
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-users"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 7m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" /><path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /><path d="M21 21v-2a4 4 0 0 0 -3 -3.85" /></svg>                        </x-slot:icon>
                    </x-card>
                </a>
            </div>

            <!-- Exames Solicitados -->
            <div class="col-md-4">
                <a href="#">
                    <x-card>
                        <span class="text-secondary">{{$pl}}</span>
                        <x-slot:title>Exames Solicitados</x-slot:title>
                        <x-slot:subtitle>Acompanhe exames solicitados</x-slot:subtitle>
                        <x-slot:bgColor>bg-red</x-slot:bgColor>
                        <x-slot:icon>
                            <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-flask"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 3l6 0" /><path d="M10 9l4 0" /><path d="M10 3v6l-4 11a.7 .7 0 0 0 .5 1h11a.7 .7 0 0 0 .5 -1l-4 -11v-6" /></svg>                        </x-slot:icon>
                    </x-card>
                </a>
            </div>
        </div>
    </div>
</x-layout>

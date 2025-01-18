@php
use App\Models\Paciente;
use App\Models\Administrador;
use App\Models\ProfissionalSaude;

// Mapeamento entre tipos de usuário e modelos
$modelMapping = [
    'paciente' => Paciente::class,
    'administrador' => Administrador::class,
    'profissionalSaude' => ProfissionalSaude::class,
];

// Busca os dados específicos do tipo de usuário, garantindo que a chave exista no mapeamento
$details = $modelMapping[$user['tipo']]::where('idUsuario', $user['idUsuario'])->first() ?? null;
@endphp

<x-layout>
    <x-slot:heading>
        <h2>{{ $user['name'] }}</h2>
    </x-slot:heading>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Descrição do Usuário</h3>
            <p class="text-secondary">Id: <strong>{{ $user['idUsuario'] }}</strong></p>
            <p class="text-secondary">O usuário é um: {{ $user['tipo'] }}</p>
            <p class="text-secondary">Senha: {{ $user['senha'] }}</p>
            <hr>
            <p class="text-secondary">
                Detalhes Específicos:
                @if($details)
                    {{ json_encode($details) }}
                @else
                    Não há detalhes disponíveis para este usuário.
                @endif
            </p>
        </div>
    </div>
</x-layout>

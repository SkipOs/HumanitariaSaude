@php
use App\Models\Paciente;
use App\Models\Administrador;
use App\Models\ProfissionalSaude;

$paciente = Paciente::where('idUsuario', $user['idUsuario'])->first();
//$admin = Administrador::where('idUsuario', $user['idUsuario'])->first();
//$profissional = ProfissionalSaude::where('idUsuario', $user['idUsuario'])->first();

@endphp

<x-layout>
    <x-slot:heading>
        <h2>{{$user['name']}}</h2>
    </x-slot:heading>
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Descrição do Usuário</h3>
            <p class="text-secondary">Id <strong>{{ $user['idUsuario'] }}</strong></p>
            <p class="text-secondary">O usuário é um {{ $user['tipo'] }}</p>
            <p class="text-secondary">Senha: {{ $user['senha'] }}</p>
            <hr>
            <p class="text-secondary">Data de Nascimento: {{ $paciente['dataNascimento'] }}</p>
            <p class="text-secondary">CPF: {{ $paciente['cpf'] }}</p>
            <p class="text-secondary">Endereço: {{ $paciente['endereco'] }}</p>
            <p class="text-secondary">Telefone: {{ $paciente['telefone'] }}</p>
            <p class="text-secondary">Última Atualização em: {{ $paciente['updated_at'] }}</p>
        </div>
      </div>
</x-layout>

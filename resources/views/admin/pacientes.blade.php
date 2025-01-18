<x-layout>
    <x-slot:heading>
        Pacientes Cadastrados
    </x-slot:heading>

    <div class="container mt-4">
        <div class="card">
        <x-table>
            <x-slot:headers>
                <th>#</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>Ações</th>
            </x-slot:headers>
            <x-slot:rows>
                <!-- Exemplo de Dados -->
                <tr>
                    <td>1</td>
                    <td>Exemplo da Silva</td>
                    <td>123.456.789-00</td>
                    <td>
                        <x-action-button href="#" color="info">Ver Detalhes</x-action-button>
                        <x-action-button href="#" color="secondary">Editar</x-action-button>
                    </td>
                </tr>

                @foreach ($users as $user)
                <tr>
                    <td>{{$user->idUsuario}}</td>
                    <td>{{$user->nome}}</td>
                    <td>{{$user->cpf}}</td>
                    <td>
                        <x-action-button href="/user/{{$user->idUsuario}}" color="info">Ver Detalhes</x-action-button>
                        <x-action-button href="#" color="secondary">Editar</x-action-button>
                    </td>
                </tr>
                @endforeach
            </x-slot:rows>
        </x-table>
        </div>
    </div>
</x-layout>

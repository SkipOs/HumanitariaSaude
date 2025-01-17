<x-layout>
    <x-slot:heading>
        Lista de Usuários
    </x-slot:heading>

    @foreach ($users as $user)
        <div class="col-4">
            <div class="card">
                <a href="../user/{{ $user['idUsuario'] }}">
                    <div class="card-header">
                        <h3 class="card-title">{{ $user['nome'] }}</h3>
                    </div>
                    <div class="card-body">
                        <p class="text-secondary">{{ $user['tipo'] }}</p>
                    </div>
                </a>
            </div>
        </div>
    @endforeach

    <div>
        {{$users->links()}}
    </div>

</x-layout>

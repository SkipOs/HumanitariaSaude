<x-layout>
    <x-slot:heading>
        Lista de Usuários
    </x-slot:heading>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <form action="/search-users" method="GET">
                <input type="text" id="search" name="search" class="form-control form-control-rounded" placeholder="Buscar..."/>
            </form>
        </div>
    </div>

    <!-- Lista de Usuários -->
    <div id="users-list" class="row mt-4">
        @foreach ($users as $user)
            <div class="col-4 mb-3 user-card">
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
    </div>

    <!-- Paginação -->
    <div id="pagination-links">
        {{ $users->links() }}
    </div>

</x-layout>

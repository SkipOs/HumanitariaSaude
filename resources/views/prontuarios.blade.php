@php
    use Carbon\Carbon;
    use App\Models\Prontuario;
    //dd($paginate);

@endphp

<x-layout>
    <x-slot:heading>
        Prontuários
    </x-slot:heading>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            <form action="/search-prontuarios" method="GET">
                <input type="text" id="search" name="search" class="form-control form-control-rounded" placeholder="Buscar..."/>
            </form>
        </div>
    </div>
    <!-- Lista de Usuários -->
    <div id="users-list" class="row mt-4">
        @foreach ($data as $prontuario)
            <div class="col-4 mb-3 user-card">
                <div class="card">
                    <a href="../prontuario/{{ $prontuario->idProntuario }}">
                        <div class="card-header">
                            <h3 class="card-title row"> {{ $prontuario->paciente->usuario->nome }}</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-secondary">Última alteração em
                                {{ Carbon::parse($prontuario->updated_at)->format('d/m/Y') }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Paginação -->
    <div id="pagination-links">
        {{ $data->links() }}
    </div>
</x-layout>

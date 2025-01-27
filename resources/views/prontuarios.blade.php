@php
use Carbon\Carbon;
use App\Models\Prontuario;

    $data = Prontuario::get();

    $dt = DB::table('consultas')
        ->join('agendamentos', 'consultas.idAgendamento', 'agendamentos.idAgendamento')
        ->join('profissional_saudes as p', 'consultas.crm', 'p.crm')
        ->join('usuarios as u', 'p.idUsuario', 'u.idUsuario')
        ->where('cpf', Auth::user()->paciente->cpf)
        ->where('data', '>=', now())
        ->select(['data', 'nome', 'especialidade'])
        ->get();

    //dd($paginate);
@endphp

<x-layout>
    <x-slot:heading>
        Prontuários
    </x-slot:heading>

    <!-- Lista de Usuários -->
    <div id="users-list" class="row mt-4">
        @foreach ($data as $prontuario)
            <div class="col-4 mb-3 user-card">
                <div class="card">
                    <a href="../prontuario/{{$prontuario->idProntuario}}">
                        <div class="card-header">
                            <h3 class="card-title row"> {{ $prontuario->paciente->usuario->nome}}</h3>
                        </div>
                        <div class="card-body">
                            <p class="text-secondary">Última alteração em {{Carbon::parse($prontuario->updated_at)->format('d/m/Y')}}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>

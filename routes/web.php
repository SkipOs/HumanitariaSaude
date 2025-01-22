<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

// Auth/Logins
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'login']);

//Route::middleware('auth')->group(function () {
//    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
//    Route::get('/paciente/dashboard', [PacienteDashboardController::class, 'index']);
//    Route::get('/profissional/dashboard', [ProfissionalDashboardController::class, 'index']);
//});

// Dashboards
Route::view('/', 'dashboards.home_admin');

Route::view('/dpaciente', 'dashboards.home_paciente');

Route::view('/dprofissional', 'dashboards.home_profissional');

///Route::view('/dadmin', 'dashboards.home_admin');

// Comuns
Route::view('/prontuario', 'prontuario');

Route::view('/profile', 'dashboards.profile');

// VIEWS DO ADMIN
//Route::view('','');
Route::get('/pacientes', function () {
    $users = DB::table('usuarios')->where('tipo', '=', 'paciente')->join('pacientes', 'usuarios.idUsuario', '=', 'pacientes.idUsuario')->get();

    return view('admin.pacientes', ['users' => $users]);
});

Route::get('/ag/{tabela}', function ($tabela) {
    //$tabela = 'usuarios';
    $data = DB::table($tabela)->get();
   // dd($data);
    return view('admin.gerenciar', ['tableName' => $tabela, 'data' => $data]);
});



// VIEWS DO PACIENTE
Route::get('/pep', function () {
    return view('paciente.exame-pendentes');
});

Route::get('/phc', function () {
    return view('paciente.consulta-historico');
});

Route::get('/pca', function () {
    return view('paciente.consulta-agenda');
});

// VIEWS DE PROFISSIONAIS DE SAUDE
Route::get('/psa', function () {
    return view('profissional.agenda');
});

// Observar usuários
Route::get('/users', function () {
    $users = Usuario::with('paciente')->latest()->simplePaginate(9);

    return view('users', [
        'users' => $users,
    ]);
});

Route::get('/search-users', [UserController::class, 'search']);


Route::get('/user/{id}', function ($id) {
    $user = Usuario::find($id);

    return view('user', ['user' => $user]);
});

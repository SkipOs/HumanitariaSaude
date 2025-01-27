<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ProfissionalSaudeController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use App\Models\Administrador;
use App\Models\Paciente;
use App\Models\ProfissionalSaude;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

// Auth/Logins/Logout
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'login']);


Route::view('/myadmin', view: 'auth.myadmin');
Route::post('/myadmin/admin', [SessionController::class, 'loginAdmin']);
Route::post('/myadmin/profissional', [SessionController::class, 'loginProfissonal']);


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

//Route::middleware('auth')->group(function () {
//      Route::get('/admin/dashboard', [AdminDashboardController::class, 'index']);
//      Route::get('/paciente/dashboard', [PacienteDashboardController::class, 'index']);
//      Route::get('/profissional/dashboard', [ProfissionalDashboardController::class, 'index']);
//});

// Dashboards
//      Route::view('/dpaciente', view: 'dashboards.home_paciente');
//      Route::view('/dprofissional', 'dashboards.home_profissional');
//      Route::view('/dadmin', 'dashboards.home_admin');

// Common
Route::get('/', function () {
    $user = Auth::user();

    if ($user == null || $user->tipo == null) {
        // Retorna para tela de login na falta de autenticação
        return redirect('/login');
    }

    if ($user->tipo == 'paciente') {
        // Redireciona para o método do PacienteController
        return view('dashboards.home_paciente', ['paciente' => Auth::user()->paciente]);
    }

    if ($user->tipo == 'profissionalSaude') {
        // Lógica para profissional
        return view('dashboards.home_profissional', ['profissional' => Auth::user()->administrado]);
    }

    if ($user->tipo == 'administrador') {
        // Lógica para administrador
        return view('dashboards.home_profissional', ['profissional' => Auth::user()->profissionalSaude]);
    }

    // Caso nenhum dos tipos acima seja válido
    abort(404);
});

Route::view('/prontuarios', 'prontuarios');

Route::get('/prontuario/{id}', function($id){

    return view('prontuario', ['id' => $id]);
});

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

<?php

use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ProntuarioController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\UserController;

use App\Models\Paciente;
use App\Models\Prontuario;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExameController;

// Auth/Logins/Logout
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'login']);

Route::view('/myadmin', view: 'auth.myadmin');
Route::post('/myadmin/admin', [SessionController::class, 'loginAdmin']);

Route::view('/psaude', view: 'auth.psaude');
Route::post('/psaude/profissional', [SessionController::class, 'loginProfissonal']);

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
        return view('dashboards.home_admin', ['profissional' => Auth::user()->profissionalSaude]);
    }

    // Caso nenhum dos tipos acima seja válido
    abort(404);
});

Route::view('/profile', 'dashboards.profile');

// VIEWS DO ADMIN
//Route::view('','');
Route::get('/pacientes', function () {
    $users = DB::table('usuarios')->where('tipo', '=', 'paciente')->join('pacientes', 'usuarios.idUsuario', '=', 'pacientes.idUsuario')->get();

    return view('admin.pacientes', ['users' => $users]);
});

//// Gerenciamento
Route::get('/ag/{tabela}', function ($tabela) {
    // Pega os dados da tabela
    //    $data = DB::table($tabela)->get();

    // Obtém a chave primária da tabela dinamicamente
    $schema = DB::getSchemaBuilder()->getColumnListing($tabela);

    // Aqui estamos assumindo que a chave primária é 'id', mas você pode adaptar isso se precisar
    // Se a tabela não tiver 'id', você pode usar uma lógica mais complexa.
    //    $primaryKey = in_array('id', $primaryKey) ? 'id' : $primaryKey[0];

    return view('admin.gerenciar', [
        'tableName' => $tabela,
        'data' => DB::table($tabela)->get(),
        'primaryKey' => in_array('id', $schema) ? 'id' : $schema[0],
        'schema' => $schema,
    ]);
});

Route::post('/ag/{tabela}/new', [TableController::class, 'new']);
Route::post('/ag/{tabela}/update/{id}', [TableController::class, 'update']);
Route::delete('/ag/{tabela}/delete/{id}', [TableController::class, 'delete']);

// VIEWS DO PACIENTE
//// Consultas Próximas
Route::get('/pca', function () {
    return view('paciente.consulta-agenda');
});
Route::post('/pca/update', [ConsultaController::class, 'update']);
Route::delete('/pca/cancelar/{id}', [ConsultaController::class, 'cancelar']);

//// Exames
Route::get('/pep', function () {
    return view('paciente.exame-pendentes');
});
Route::post('/pep/update', [ExameController::class, 'update']);
Route::delete('/pep/cancelar/{id}', [ExameController::class, 'cancelar']);

//// Histórico apenas de Consultas
Route::get('/pch', function () {
    return view('paciente.consulta-historico');
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

// Observar Prontuarios
Route::get('/search-prontuarios', [ProntuarioController::class, 'search']);
Route::get('/prontuario/{id}', function($id){
    return view('prontuario', ['id' => $id]);
});

Route::get('/prontuarios', function () {
    $data = Prontuario::with('paciente')->latest()->simplePaginate(9);

    return view('prontuarios', [
        'data' => $data,
    ]);
});

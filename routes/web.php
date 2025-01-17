<?php

use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;
use App\Models\Usuario;


Route::view('/', 'dashboards.home');
Route::view('/contact', 'contact');
Route::view('/profile', 'dashboards.profile');

//controller logo mais vvvvvv
Route::get('/users', function (){
    $users = Usuario::with('paciente')->latest()->paginate(9);
    
    return view('users', [
        'users' => $users
    ]);
});

Route::get('/user/{id}', function ($id){
    $user = Usuario::find($id);

    return view('user', ['user' => $user]);
});

// Auth
Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
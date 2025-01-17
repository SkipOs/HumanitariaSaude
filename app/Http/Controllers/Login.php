<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['nome' => $credentials['username'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            $user = Auth::user();

            switch ($user->tipo) {
                case 'administrador':
                    return redirect()->route('admin.dashboard');
                case 'paciente':
                    return redirect()->route('paciente.dashboard');
                case 'profissionalSaude':
                    return redirect()->route('profissional.dashboard');
                default:
                    Auth::logout();
                    return redirect('/')->withErrors(['login' => 'Tipo de usuário desconhecido.']);
            }
        }

        return back()->withErrors(['login' => 'Usuário ou senha inválidos.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

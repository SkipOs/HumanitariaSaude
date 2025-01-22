<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle the login attempt.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validar os dados de entrada
        $request->validate([
            'cpf' => ['required'],
            'senha' => ['required', Password::min(4)],
        ]);

        // Verificar se o CPF existe na tabela pacientes
        $paciente = Paciente::where('cpf', $request->cpf)->first();

        if ($paciente && Hash::check($request->senha, $paciente->usuario->senha)) {
            // Login bem-sucedido
            Auth::login($paciente->usuario);  // Logar no sistema com base no usuário associado ao paciente

            // Redirecionar para a página de dashboard com base no tipo de usuário
            switch ($paciente->usuario->tipo) {
                case 'administrador':
                    return redirect('/');
                case 'paciente':
                    return redirect('/');
                case 'profissionalSaude':
                    return redirect('/');
                default:
                    return redirect('/login')->with('error', 'Tipo de usuário desconhecido.');
            }
        } else {
            // Caso o login falhe
            return redirect()->back()->with('error', 'CPF ou senha inválidos.');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use App\Models\Paciente;
use App\Models\ProfissionalSaude;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use App\Http\Controllers\PacienteController;

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
            'email' => ['required'],
            'senha' => ['required', Password::min(4)],
        ]);

        // Verificar se o email existe na tabela pacientes
        $usuario = Paciente::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->usuario->senha)) {
            // Login bem-sucedido
            Auth::login($usuario->usuario); // Logar no sistema com base no usuário associado ao paciente
            // Redirecionar para a página de dashboard com base no tipo de usuário
            return redirect('/');

        } else {
            // Caso o login falhe
            return redirect()->back()->with('error', 'email ou senha inválidos.');
        }
    }

    public function loginAdmin(Request $request)
    {
        // Validar os dados de entrada
        $request->validate([
            'email' => ['required'],
            'senha' => ['required', Password::min(4)],
        ]);


        //  dd($request->telefone   );
        // Verificar se o Email existe na tabela admin
        $usuario = Administrador::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->usuario->senha)) {
            // Login bem-sucedido
            Auth::login($usuario->usuario); // Logar no sistema com base no usuário associado ao admin

            // Redirecionar para a página de dashboard com base no tipo de usuário
            return redirect('/');

        } else {
            // Caso o login falhe
            return redirect()->back()->with('error', 'email ou senha inválidos.');
        }
    }

    public function loginProfissonal(Request $request)
    {
        // Validar os dados de entrada
        $request->validate([
            'email' => ['required'],
            'senha' => ['required', Password::min(4)],
        ]);

        // Verificar se o email existe na tabela profissional
        $usuario = ProfissionalSaude::where('email', $request->email)->first();

        if ($usuario && Hash::check($request->senha, $usuario->usuario->senha)) {
            // Login bem-sucedido
            Auth::login($usuario->usuario); // Logar no sistema com base no usuário associado ao paciente
            // Redirecionar para a página de dashboard com base no tipo de usuário
            return redirect('/');

        } else {
            // Caso o login falhe
            return redirect()->back()->with('error', 'email ou senha inválidos.');
        }
    }
}

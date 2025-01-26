<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Validator;

class RegisteredUserController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration of a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validar os dados recebidos
        $validated = $request->validate([
            'nome' => ['required'],
            'cpf' => ['required'],
            'dataNascimento' => ['required'],
            'endereco' => ['nullable'],
            'telefone' => ['nullable'],
            'senha' => ['required', Password::min(4), 'confirmed'], // Senha deve ser confirmada
        ]);

        // Criar o usuário
        $usuario = Usuario::create([
            'nome' => $validated['nome'],
            'senha' => Hash::make($validated['senha']),
        ]);

        $cpf = str_replace(['.', '-'], '', $request->input('cpf'));

        // Agora insira o CPF sem a formatação
        Paciente::create([
            'cpf' => $cpf,
            'idUsuario' => $usuario->idUsuario,
            'dataNascimento' => $request->input('dataNascimento'),
            'endereco' => $request->input('endereco'),
            'telefone' => $request->input('telefone'),
        ]);

        // Redirecionar para a página de login
        return redirect('/')->with('success','Cadastro realizado com sucesso!');
    }
}

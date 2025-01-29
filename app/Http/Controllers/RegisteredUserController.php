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
        $validator = Validator::make($request->all(), [
            'nome' => ['required'],
            'cpf' => ['required'],
            'dataNascimento' => ['required'],
            'endereco' => ['nullable'],
            'telefone' => ['nullable'],
            'senha' => ['required', Password::min(4), 'confirmed'], // Senha deve ser confirmada
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Falha no cadastro.')->withInput();
        }

        $cpf = str_replace(['.', '-'], '', $request->input('cpf'));

        // Verificar se o CPF já está cadastrado
        if (Paciente::where('cpf', $cpf)->exists()) {
            return redirect()->back()->with('error', 'Este CPF já está cadastrado.')->withInput();
        }

        // Criar o usuário
        $usuario = Usuario::create([
            'nome' => $request->input('nome'),
            'senha' => Hash::make($request->input('senha')),
        ]);

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

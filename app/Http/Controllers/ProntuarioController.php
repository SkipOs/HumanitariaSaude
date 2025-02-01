<?php

namespace App\Http\Controllers;

use App\Models\Prontuario;
use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ProntuarioController extends Controller
{
    /**
     * Realiza a busca de usuários com base no texto da consulta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = Prontuario::join('pacientes','pacientes.cpf','prontuarios.cpf')
            ->join('usuarios', 'pacientes.idUsuario', 'usuarios.idUsuario')
            ->where('nome', 'LIKE', "%$search%")
            ->paginate(9);

        //dd($results);
        //->paciente->usuario->where('nome', 'LIKE', "%$search%")->paginate(9);

        return view('prontuarios', ['data' => $results]);
    }
}

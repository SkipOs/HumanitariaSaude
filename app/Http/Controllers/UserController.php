<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $results = Usuario::where('nome', 'LIKE', "%$search%")->paginate(9);

        return view('users', ['users' => $results]);
    }
}

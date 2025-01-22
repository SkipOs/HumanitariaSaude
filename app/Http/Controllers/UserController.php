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
        $query = $request->get('query', '');

        // Busca os usuários com base na consulta, com paginação
        $users = Usuario::where('nome', 'like', '%' . $query . '%')
                        ->orWhere('tipo', 'like', '%' . $query . '%')
                        ->latest()
                        ->paginate(9);

        // Retorna os resultados como JSON
        return response()->json([
            'users' => $users->items(), // Retorna os itens da página
            'pagination' => [
                'total' => $users->total(),
                'current_page' => $users->currentPage(),
                'last_page' => $users->lastPage(),
            ]
        ]);
    }
}

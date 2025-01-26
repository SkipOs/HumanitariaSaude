<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Paciente;

class ApiController extends Controller
{
    //
    public function buscarPaciente(Usuario $auth)
    {
        //recebe um usuario e retorna o paciente relacionado
        return Paciente::where('idUsuario','=', $auth->idUsuario)->first();
    }
}

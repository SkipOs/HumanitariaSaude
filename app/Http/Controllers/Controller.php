<?php

namespace App\Http\Controllers;

use App\Models\Administrador;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Usuario;
use App\Models\Paciente;
use App\Models\ProfissionalSaude;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

}

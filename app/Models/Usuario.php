<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;
    protected $primaryKey = 'idUsuario';

    protected $fillable = ['nome', 'senha', 'tipo'];

    // Relacionamentos
    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'idUsuario');
    }

    public function profissionalSaude()
    {
        return $this->hasOne(ProfissionalSaude::class, 'idUsuario');
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'idUsuario');
    }
}

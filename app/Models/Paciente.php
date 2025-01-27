<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $primaryKey = 'cpf';

    protected $fillable = ['cpf','idUsuario', 'dataNascimento', 'endereco', 'telefone'];

    // Relacionamentos
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function prontuarios()
    {
        return $this->hasOne(Prontuario::class, 'cpf');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'cpf');
    }
}

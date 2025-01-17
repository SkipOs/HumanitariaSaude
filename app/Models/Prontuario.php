<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prontuario extends Model
{
    use HasFactory;

    protected $primaryKey = 'idProntuario';

    protected $fillable = ['cpf'];

    // Relacionamentos
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'cpf');
    }

    public function exames()
    {
        return $this->hasMany(Exame::class, 'idProntuario');
    }
}

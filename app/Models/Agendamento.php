<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;
    protected $primaryKey = 'idAgendamento';

    protected $fillable = ['data'];

    // Relacionamentos
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'idAgendamento');
    }

    public function exames()
    {
        return $this->hasMany(Exame::class, 'idAgendamento');
    }
}

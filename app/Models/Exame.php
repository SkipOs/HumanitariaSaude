<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exame extends Model
{
    use HasFactory;
    protected $primaryKey = 'idExame';

    protected $fillable = ['idProntuario', 'tipo', 'resultado', 'idAgendamento'];

    // Relacionamentos
    public function prontuario()
    {
        return $this->belongsTo(Prontuario::class, 'idProntuario');
    }

    public function agendamento()
    {
        return $this->belongsTo(Agendamento::class, 'idAgendamento');
    }

    public function diagnosticos()
    {
        return $this->hasMany(Diagnostico::class, 'idExame');
    }
}

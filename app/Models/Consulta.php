<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;
    protected $primaryKey = 'idConsulta';

    protected $fillable = ['idInstituicao', 'crm', 'cpf', 'idAgendamento', 'motivo'];

    // Relacionamentos
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'cpf');
    }

    public function profissionalSaude()
    {
        return $this->belongsTo(ProfissionalSaude::class, 'crm');
    }

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class, 'idInstituicao');
    }

    public function agendamento()
    {
        return $this->belongsTo(Agendamento::class, 'idAgendamento');
    }

    public function prescricoes()
    {
        return $this->hasMany(Prescricao::class, 'idConsulta');
    }
}

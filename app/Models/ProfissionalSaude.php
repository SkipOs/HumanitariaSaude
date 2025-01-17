<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfissionalSaude extends Model
{
    use HasFactory;
    protected $id = 'crm';

    protected $fillable = ['crm', 'idUsuario', 'especialidade'];

    // Relacionamentos
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }

    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'crm');
    }
}

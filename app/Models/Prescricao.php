<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescricao extends Model
{
    use HasFactory;
    protected $primaryKey = 'idConsulta';

    protected $fillable = ['idConsulta', 'nomeMedicamento', 'dosagem', 'data'];

    // Relacionamentos
    public function consulta()
    {
        return $this->belongsTo(Consulta::class, 'idConsulta');
    }
}

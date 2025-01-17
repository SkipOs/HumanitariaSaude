<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    use HasFactory;
    protected $primaryKey = 'idInstituicao';

    protected $fillable = ['nome', 'cnpj', 'endereco'];

    // Relacionamentos
    public function consultas()
    {
        return $this->hasMany(Consulta::class, 'idInstituicao');
    }
}

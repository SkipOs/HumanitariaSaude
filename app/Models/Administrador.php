<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    use HasFactory;

    protected $table = 'administrador'; // Define o nome da tabela como singular
    protected $primaryKey = 'idAdmin';

    protected $fillable = ['idUsuario', 'email', 'telefone'];

    // Relacionamentos
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'idUsuario');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['name', 'path'];

    // Relacionamentos
    public function diagnosticos()
    {
        return $this->belongsto(Diagnostico::class, 'idExame');
    }
}


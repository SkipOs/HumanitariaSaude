<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Administrador;

class AdministradorFactory extends Factory
{
    protected $model = Administrador::class;

    public function definition()
    {
        return [
            'idUsuario' => \App\Models\Usuario::factory()->create(['tipo'=>'administrador']),
            'telefone' => $this->faker->numerify('###########'),
        ];
    }
}

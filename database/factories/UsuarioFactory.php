<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'senha' => bcrypt('password'), // Default hashed password
            'tipo' => $this->faker->randomElement(['paciente', 'profissionalSaude', 'administrador']),
        ];
    }
}
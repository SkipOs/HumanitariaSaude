<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use App\Models\Paciente;
use App\Models\ProfissionalSaude;
use App\Models\Administrador;

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

    // Método para criar um usuário do tipo 'Paciente'
    public function paciente()
    {
        return $this->state(function (array $attributes) {
            return ['tipo' => 'paciente'];
        })->afterCreating(function (Usuario $usuario) {
            Paciente::factory()->create(['idUsuario' => $usuario->id]);
        });
    }

    // Método para criar um usuário do tipo 'ProfissionalSaude'
    public function profissionalSaude()
    {
        return $this->state(function (array $attributes) {
            return ['tipo' => 'profissionalSaude'];
        })->afterCreating(function (Usuario $usuario) {
            ProfissionalSaude::factory()->create(['idUsuario' => $usuario->id]);
        });
    }

    // Método para criar um usuário do tipo 'Administrador'
    public function administrador()
    {
        return $this->state(function (array $attributes) {
            return ['tipo' => 'administrador'];
        })->afterCreating(function (Usuario $usuario) {
            Administrador::factory()->create(['idUsuario' => $usuario->id]);
        });
    }
}

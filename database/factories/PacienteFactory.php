<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Paciente;

class PacienteFactory extends Factory
{
    protected $model = Paciente::class;

    public function definition()
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'cpf' => $this->faker->unique()->numberBetween(10000000000, 99999999999),
            'idUsuario' => \App\Models\Usuario::factory()->create(['tipo'=>'paciente']),
            'dataNascimento' => $this->faker->date('Y-m-d', '2005-12-31'),
            'endereco' => $this->faker->address,
            'telefone' => $this->faker->numerify('###########'),
        ];
    }
}

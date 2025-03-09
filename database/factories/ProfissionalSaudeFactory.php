<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProfissionalSaude;

class ProfissionalSaudeFactory extends Factory
{
    protected $model = ProfissionalSaude::class;

    public function definition()
    {
        return [
            'email' => fake()->unique()->safeEmail(),
            'crm' => $this->faker->unique()->numerify('########'),
            'idUsuario' => \App\Models\Usuario::factory()->create(['tipo'=>'profissionalSaude']),
            'especialidade' => $this->faker->jobTitle,
        ];
    }
}


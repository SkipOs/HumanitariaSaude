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
            'crm' => $this->faker->unique()->numerify('########'),
            'idUsuario' => \App\Models\Usuario::factory(),
            'especialidade' => $this->faker->jobTitle,
        ];
    }
}


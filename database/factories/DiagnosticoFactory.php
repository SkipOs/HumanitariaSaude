<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Diagnostico;

class DiagnosticoFactory extends Factory
{
    protected $model = Diagnostico::class;

    public function definition()
    {
        return [
            'idExame' => \App\Models\Exame::factory(),
            'data' => $this->faker->date,
            'descricao' => $this->faker->paragraph,
        ];
    }
}
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prescricao;

class PrescricaoFactory extends Factory
{
    protected $model = Prescricao::class;

    public function definition()
    {
        return [
            'idConsulta' => \App\Models\Consulta::factory(),
            'nomeMedicamento' => $this->faker->word,
            'dosagem' => $this->faker->sentence,
            'data' => $this->faker->date,
        ];
    }
}

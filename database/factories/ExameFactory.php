<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exame;

class ExameFactory extends Factory
{
    protected $model = Exame::class;

    public function definition()
    {
        return [
            'idProntuario' => \App\Models\Prontuario::factory(),
            'tipo' => $this->faker->word,
            'resultado' => $this->faker->paragraph,
            'idAgendamento' => \App\Models\Agendamento::factory(),
        ];
    }
}
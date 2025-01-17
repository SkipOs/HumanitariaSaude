<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Agendamento;

class AgendamentoFactory extends Factory
{
    protected $model = Agendamento::class;

    public function definition()
    {
        return [
            'data' => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
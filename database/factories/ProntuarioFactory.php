<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Prontuario;

class ProntuarioFactory extends Factory
{
    protected $model = Prontuario::class;

    public function definition()
    {
        return [
            'cpf' => \App\Models\Paciente::factory(),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Consulta;

class ConsultaFactory extends Factory
{
    protected $model = Consulta::class;

    public function definition()
    {
        return [
            'idInstituicao' => \App\Models\Instituicao::factory(),
            'idProfissionalSaude' => \App\Models\ProfissionalSaude::factory(),
            'idPaciente' => \App\Models\Paciente::factory(),
            'idAgendamento' => \App\Models\Agendamento::factory(),
            'motivo' => $this->faker->sentence,
        ];
    }
}
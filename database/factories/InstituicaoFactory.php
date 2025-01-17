<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Instituicao;

class InstituicaoFactory extends Factory
{
    protected $model = Instituicao::class;

    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'cnpj' => $this->faker->numerify('##.###.###/####-##'),
            'endereco' => $this->faker->address,
        ];
    }
}

<?php
use App\Models\Paciente;

// tests/Feature/RegisteredUserControllerTest.php
it('registers a new user successfully', function () {
    $data = [
        'nome' => 'John Doe',
        'cpf' => '12345678900',
        'dataNascimento' => '1990-01-01',
        'senha' => 'senha_segura',
        'senha_confirmation' => 'senha_segura',
    ];

    $response = $this->post('/register', $data);

    $response->assertRedirect('/login');
    $this->assertDatabaseHas('usuarios', ['nome' => 'John Doe']);
    $this->assertDatabaseHas('pacientes', ['cpf' => '12345678900']);
});

it('validates CPF uniqueness on registration', function () {
    Paciente::factory()->create(['cpf' => '12345678900']);

    $data = [
        'nome' => 'Jane Doe',
        'cpf' => '12345678900',
        'dataNascimento' => '1995-02-02',
        'senha' => 'senha_segura',
        'senha_confirmation' => 'senha_segura',
    ];

    $response = $this->post('/register', $data);

    $response->assertSessionHasErrors('cpf');
});

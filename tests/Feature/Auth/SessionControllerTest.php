<?php
use App\Models\Paciente;
use App\Models\Usuario;

// tests/Feature/SessionControllerTest.php
it('logs in a patient successfully', function () {
    $usuario = Usuario::factory()->create(['tipo' => 'paciente']);
    $paciente = Paciente::factory()->create(['idUsuario' => $usuario->idUsuario]);
    $credentials = ['cpf' => $paciente->cpf, 'senha' => 'senha_segura'];

    $response = $this->post('/login', $credentials);

    $response->assertRedirect('/dpaciente');
    $this->assertAuthenticatedAs($paciente->usuario);
});


it('shows error for invalid credentials', function () {
    $response = $this->post('/login', ['cpf' => '00000000000', 'senha' => 'senha_errada']);

    $response->assertSessionHas('error', 'CPF ou senha inválidos.');
});


<?php
// tests/Feature/ValidationTest.php
it('validates CPF field', function () {
    $response = $this->post('/login', ['cpf' => '', 'senha' => 'senha_segura']);

    $response->assertSessionHasErrors('cpf');
});

it('validates password length', function () {
    $response = $this->post('/login', ['cpf' => '12345678900', 'senha' => '123']);

    $response->assertSessionHasErrors('senha');
});

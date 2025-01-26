<?php
// tests/Feature/
it('displays the login form', function () {
    $response = $this->get('/login');

    $response->assertStatus(200);
    $response->assertSee('CPF');
    $response->assertSee('Senha');
});

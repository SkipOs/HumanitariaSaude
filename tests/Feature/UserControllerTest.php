<?php
use App\Models\Usuario;

// tests/Feature/UserControllerTest.php
it('returns users matching query', function () {
    $usuario = Usuario::factory()->create(['nome' => 'Test User']);

    $response = $this->getJson('/users?query=Test');

    $response->assertStatus(200);
    $response->assertJsonFragment(['nome' => 'Test User']);
});

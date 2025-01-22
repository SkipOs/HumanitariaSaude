<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;  // Altere para estender Authenticatable
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable  // Estenda a classe Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'idUsuario';  // Continue com seu identificador primário personalizado

    protected $fillable = ['nome', 'senha', 'tipo'];

    // Relacionamentos
    public function paciente()
    {
        return $this->hasOne(Paciente::class, 'idUsuario');
    }

    public function profissionalSaude()
    {
        return $this->hasOne(ProfissionalSaude::class, 'idUsuario');
    }

    public function administrador()
    {
        return $this->hasOne(Administrador::class, 'idUsuario');
    }

    /**
     * Obtém o identificador do usuário.
     *
     * @return mixed
     */
    public function getAuthIdentifierName()
    {
        return 'idUsuario';  // Se estiver usando 'idUsuario' como identificador único
    }

    /**
     * Obtém a senha do usuário.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->senha;  // Retorna a senha criptografada
    }

    /**
     * Obtém o token de lembrar-me (opcional).
     *
     * @return string|null
     */
    public function getRememberToken()
    {
        return $this->remember_token;
    }

    /**
     * Define o token de lembrar-me (opcional).
     *
     * @param  string  $value
     * @return void
     */
    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    /**
     * Obtém o nome do campo de token de lembrar-me.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}

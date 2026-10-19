<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    //aca agregamos el rol para el login
    public const ROL_ADMIN = 'admin';
    public const ROL_USUARIO = 'usuario';
    /**roles validos:  se usan validadciones y en el <select> del formulario */
    public const ROLES = [
        self::ROL_ADMIN  => 'Administrador',
        self::ROL_USUARIO,
    ];
    protected $attributes = [
        'rol',
        'email',
        'password',
        'rol',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // senecripta solo al asignar.
        ];
    }
    //aca agregamos el rol para el login
    public function esAdmin(): bool
    {
        return $this->rol === self::ROL_ADMIN;
    }
    public function tieneRol(string $rol): bool
    {
        return in_array($this ->rol, $rol, true);
    }
}

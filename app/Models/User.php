<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'usuario';

    protected $primaryKey = 'id_usuario';

    protected $fillable = [
        'nombre',
        'correo',
        'password_hash',
        'rol',
        'id_cliente',
        'id_empleado',
        'estado',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    /*
    |--------------------------------------------------------------------------
    | Campo de contraseña para autenticación
    |--------------------------------------------------------------------------
    | El proyecto usa password_hash en lugar del campo password tradicional.
    */

    public function getAuthPasswordName()
    {
        return 'password_hash';
    }

    public function getAuthPassword()
    {
        return $this->password_hash;
    }

    /*
    |--------------------------------------------------------------------------
    | Normalización de correo
    |--------------------------------------------------------------------------
    | Evita problemas por espacios o mayúsculas al guardar usuarios.
    */

    public function setCorreoAttribute($value): void
    {
        $this->attributes['correo'] = strtolower(trim($value));
    }

    /*
    |--------------------------------------------------------------------------
    | Relaciones
    |--------------------------------------------------------------------------
    */

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado', 'id_empleado');
    }

    /*
    |--------------------------------------------------------------------------
    | Utilidades de rol
    |--------------------------------------------------------------------------
    */

    public function es(string $rol): bool
    {
        return $this->rol === $rol;
    }

    public function esAdministrador(): bool
    {
        return $this->rol === 'administrador';
    }

    public function esEmpleado(): bool
    {
        return $this->rol === 'empleado';
    }

    public function esCliente(): bool
    {
        return $this->rol === 'cliente';
    }

    public function estaActivo(): bool
    {
        return $this->estado === 'Activo';
    }
}
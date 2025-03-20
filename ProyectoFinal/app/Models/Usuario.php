<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // IMPORTANTE
use Illuminate\Notifications\Notifiable; // OPCIONAL, PERO RECOMENDADO PARA NOTIFICACIONES
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usuario extends Authenticatable // EXTENDER LA CLASE CORRECTA
{
    use HasFactory, Notifiable; // AÑADIR Notifiable SI QUIERES SOPORTE PARA NOTIFICACIONES

    protected $table = "usuarios"; // NOMBRE DE LA TABLA

    // CAMPOS PERMITIDOS EN LA TABLA
    protected $fillable = [
        'nombre',
        'rol',
        'correo',
        'password',
    ];

    // OCULTAR CAMPOS SENSIBLES
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // UN USUARIO PUEDE HACER MUCHOS PEDIDOS
    public function pedidos()
    {
        return $this->hasMany(Pedido::class, "id_usuario"); // RELACIÓN CON LA TABLA PEDIDOS
    }
}
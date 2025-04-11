<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    //Indicamod el nombre de la tabla que se va a usar
    protected $table='users';

    //Especificamos los campos que la componen
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'usugrucod',
        'usuclicod',
        'usucencod',
        'remember_token',
        'usutarcod',
        'usuofecod',
        'usudocpen',
        'usudes1',
        'usunuevo',
        'usurprcod',
        'usuivacod',
        'usudistribuidor',
        'usudiareparto',
        'usunif'
    ];

    /**
     * Atributos que deben permanecer ocultos cuando el modelo se convierte a JSON.
     * Se usa para ocultar información sensible, como contraseñas o tokens de sesión.
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Conversión automática de tipos para ciertos campos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}
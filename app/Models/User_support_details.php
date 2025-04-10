<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_support_details extends Model
{
    protected $table= 'users_support';

    protected $fillable = [
        'id_user_support',
        'tecnico',
        'observaciones',
        'tiempo_uso',
        'created_at',
        'update_at',
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }
}

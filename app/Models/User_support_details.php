<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_support_details extends Model
{
    protected $table= 'users_support_details';

    protected $fillable = [
        'id_user_support',
        'tecnico',
        'observaciones',
        'tiempo_uso'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
            'tiempo_uso' => 'datetime'
        ];
    }
}

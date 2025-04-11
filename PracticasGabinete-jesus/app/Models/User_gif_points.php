<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_gif_points extends Model
{
    protected $table = 'users_gif_points';

    protected $fillable = [
        'gif_point_id',
        'user_id',
        'fecha_validez',
    ];

    protected function casts(): array
    {
        return [
            'fecha_validez' => 'datetime',
        ];
    }
}

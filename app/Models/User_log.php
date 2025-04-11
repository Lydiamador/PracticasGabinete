<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_log extends Model
{
    protected $table = 'users_log';

    protected $fillable = [
        'name',
        'email',
        'usuclicod',
        'usucencod',
        'fechorentrada',
        'fechorsalida'
    ];

    protected function casts(): array
    {
        return [
            'fechorentrada' => 'datetime',
            'fechorsalida' => 'datetime'
        ];
    }
}

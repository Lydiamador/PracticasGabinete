<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agentes extends Model
{
    protected $table = 'agentes';
    protected $fillable = [

        'id',
        'name',
        'email',
        'password',
        'tipo',
        'foto'
    ];
}

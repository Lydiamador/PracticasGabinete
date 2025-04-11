<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GiftPoints extends Model
{
    protected $table = 'gift_points';
    protected $fillable = [
        'id',
        'codigo',
        'euros',
        'puntos'
    ];
}

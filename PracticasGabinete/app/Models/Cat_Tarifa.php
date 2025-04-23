<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat_Tarifa extends Model
{
    protected $table = 'cat_tarifas';
    protected $fillable=[
        'id',
        'tarifa',
        'nombre',
        'defecto'
    ];
}

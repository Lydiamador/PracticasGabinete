<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plato extends Model
{
    use HasFactory;

    protected $table="platos"; // NOMBRE DE LA TABLA

    // CAMPOS PERMITIDOS EN LA TABLA
    protected $fillable = [
        'nombre',
        'tipo',
        'precio'
    ];

}

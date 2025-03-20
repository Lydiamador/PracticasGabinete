<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Menu extends Model
{
    use HasFactory;

    protected $table ="menus"; // NOMBRE DE LA TABLA
     
    // CAMPOS PERMITIDOS EN LA TABLA
    protected $fillable = [
        'fecha',
        'descripcion',
        'precio'
    ];
}

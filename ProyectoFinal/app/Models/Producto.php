<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Producto extends Model
{
    use HasFactory;

    protected $table ="productos"; // NOMBRE DE LA TABLA
     
    // CAMPOS PERMITIDOS EN LA TABLA
    protected $fillable = [
        'categoria',
        'nombre',
        'precio'
    ];
}

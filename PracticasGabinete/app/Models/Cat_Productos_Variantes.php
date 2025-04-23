<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat_Productos_Variantes extends Model
{
    protected $table = 'cat_productos_variantes';
    protected $fillable=[
        'id',
        'id_producto',
        'atributos',
        'texto_es',
        'ref',
        'peso',
        'stock',
        'imagen',
        'imagen_archivo',
        'defecto',
        'orden'
    ];
}

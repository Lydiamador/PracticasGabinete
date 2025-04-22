<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caracteristicas_Articulos extends Model
{
    protected $table = 'caracteristicas_articulos';
    protected $fillable = [
        'id',
        'articulo_artcod',
        'eficiencia_energetica',
        'agarre_en_mojado',
        'ruido_exterior_db',
        'ruido_exterior_ondas',
        'temporada',
        'fecha_fabricacion',
        'created_at',
        'updated_at'
    ];
}

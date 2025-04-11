<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_articulo_etiqueta extends Model
{
    protected $table='qarticulo_etiqueta';

    protected $fillable=[
        'etiartcod',
        'etitagcod'
    ];
}

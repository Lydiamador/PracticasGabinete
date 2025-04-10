<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_articulo_barra extends Model
{
    protected $table ='qarticulo_barra';

    protected $fillable=[
        'barartcod',
        'barcod',
        'barcan'
    ];
}

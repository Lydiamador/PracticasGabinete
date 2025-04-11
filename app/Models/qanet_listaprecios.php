<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qanet_listaprecios extends Model
{
    protected $table='qanet_listaprecios';

    protected $fillable=[
        'clicod',
        'clicencod',
        'artcod',
        'precioconporte',
        'preciosinporte'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_articulo_precio extends Model
{
    protected $table= 'qarticulo_precio';

    protected $fillable = [
        'preartcod',
        'pretarcod',
        'preimp',
        'preimp2'
    ];
}

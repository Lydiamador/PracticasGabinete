<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_articulo_imagen extends Model
{
    protected $table ='qarticulo_imagen';

    protected $fillable= [
        'imaartcod',
        'imacod',
        'imanom',
        'imatip'
    ];
}

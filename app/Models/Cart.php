<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    // PROTEGEMOS LA TABLA
    protected $table = 'cart';
    // PROTEGEMOS LOS DATOS
    protected $fillable = [
        'cartcod',
        'cartartcod',
        'cartusucod',
        'cartcant',
        'created_at',
        'updated_at',
        'cartcajcod',
        'cartcantcaj'
    ];
}

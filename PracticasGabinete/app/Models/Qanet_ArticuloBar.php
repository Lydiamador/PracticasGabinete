<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_ArticuloBar extends Model
{
    protected $table = 'qanet_articulobar';
    protected $fillable = [
        'barartcod',
        'barcon',
        'barcod',
        'barcan'
    ];
}

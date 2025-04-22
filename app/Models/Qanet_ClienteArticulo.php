<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_ClienteArticulo extends Model
{
    protected $table = 'qanet_clientearticulo';
    protected $fillable = [
        'clicod',
        'clicencod',
        'artcod'
    ];
}

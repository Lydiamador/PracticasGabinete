<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_ClienteCategoria extends Model
{
    protected $table = 'qanet_clientecategoria';
    protected $fillable = [
        'clicod',
        'clicencod',
        'catcod'
    ];
}

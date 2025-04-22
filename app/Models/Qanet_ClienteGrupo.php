<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_ClienteGrupo extends Model
{
    protected $table="qanet_clientegrupo";
    protected $fillable = [
        'clicod',
        'clicencod',
        'grucod',   
    ];
}

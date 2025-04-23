<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClientesDirecciones extends Model
{
    protected $table = 'clientes_direcciones';

    protected $fillable = [
        'dirid',
        'cliid',
        'dirnom',
        'dirape',
        'dirdir',
        'dirpob',
        'dirpai',
        'dircp',
        'dirtfno1',
        'dirtfno2',
        'dirclicod',
        'dircencod',
        'dirtip',
        'dirpro'
    ];
}

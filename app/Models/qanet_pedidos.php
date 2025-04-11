<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qanet_pedidos extends Model
{
    protected $table= 'qanet_pedidos';

    protected $fillable = [
        'id',
        'accdes',
        'accdes2',
        'accdes3',
        'accpor',
        'accrecmer',
        'accpedcli',
        'accalbcer',
        'accpro',
        'accdep',
        'accclicod',
        'acccencod' 
    ];
}

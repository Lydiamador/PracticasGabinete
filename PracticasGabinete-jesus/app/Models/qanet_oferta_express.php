<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qanet_oferta_express extends Model
{
    protected $table = 'qanet_oferta_express';

    protected $fillable =[
        'idartcod',
        'ofeartcod',
        'ofepre',
        'ofefecini',
        'ofefecfin'
    ];

    protected function casts(): array
    {
        return [
            'ofefecini' => 'datetime',
            'ofefecfin' => 'datetime'
        ];
    }
}

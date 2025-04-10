<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_ofertac extends Model
{
    protected $table='qofertac';

    protected $fillable=[
        'ofcnum',
        'ofccod',
        'ofcartcod',
        'ofcfecini',
        'ofcfecfin',
        'ofccatcodw1',
        'OFCIMP',
        'ofctip',
        'ofcima',
        'ofcfamcod',
        'ofcsfacod'
    ];

    protected function casts(): array
    {
        return [
            'ofcfecini' => 'datetime',
            'ofcfecfin' => 'datetime'
        ];
    }
}

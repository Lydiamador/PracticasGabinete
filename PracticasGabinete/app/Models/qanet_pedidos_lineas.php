<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qanet_pedidos_lineas extends Model
{
    protected $table = 'qanet_pedidos_lineas';

    protected $fillable = [
        'id',
        'pedido_id',
        'aclcancaj',
        'aclcajcod',
        'aclextcod',
        'aclextpre',
        'aclpre',
        'aclprelin',
        'aclpretot',
        'aclpreiva',
        'acldes',
        'acldes2',
        'acldes3',
        'aclivaimp',
        'aclrecimp',
        'aclimp',
        'aclimptot',
        'aclcajtip',
        'acllot',
        'aclfeccon'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos_Lineas extends Model
{
    protected $table = 'pedidos_lineas';
    protected $fillable = [
        'id',
        'pedido_id',
        'id_listaregalos',
        'producto_id',
        'variante_id',
        'producto_ref',
        'cantidad',
        'precio',
        'impuesto',
        'impuesto_tasa',
        'impuesto_re',
        'observaciones',
        'aclcancaj',
        'aclcanjcod',
        'nombre_articulos',
        'iva',
        'iva_porcentaje',
        'recargo',
        'recargo_porcentaje',
        'es_app'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    protected $table = 'pedidos';

    protected $fillable = [
        'id',
        'id_listaregalos',
        'referencia',
        'cliente_idioma',
        'cliente_id',
        'cliente_tarifa',
        'cliente_re',
        'cliente_nombre',
        'cliente_apellidos',
        'cliente_email',
        'cliente_empresa',
        'cliente_documento',
        'cliente_direccion',
        'cliente_pais',
        'cliente_poblacion',
        'cliente_cp',
        'cliente_provincia',
        'cliente_provincia_txt',
        'cliente_tfno1',
        'cliente_tfno2',
        'dif_destino',
        'env_nombre',
        'env_apellidos',
        'env_empresa',
        'env_documento',
        'env_pais',
        'env_direccion',
        'env_poblacion',
        'env_provincia',
        'env_provincia_txt',
        'env_cp',
        'env_tfno_1',
        'env_tfno_2',
        'fecha',
        'peso',
        'subtotal',
        'descuento',
        'descuento_porcentaje',
        'gastos_envio',
        'total',
        'forma_pago',
        'dto_fpago_tipo',
        'dto_fpago_porcentaje',
        'dto_fpago_minimo',
        'dto_fpago_importe',
        'dto_cupon_id',
        'dto_cupon_nombre',
        'dto_cupon_porcentaje',
        'dto_cupon_importe',
        'forma_envio',
        'observaciones',
        'impuestos_incluidos',
        'iva_porcentaje',
        'iva_importe',
        'atendido',
        'aceptado',
        'estado',
        'fecha_entrega',
        'accclicod',
        'acccencod',
        'env_pais_txt'
    ];
}

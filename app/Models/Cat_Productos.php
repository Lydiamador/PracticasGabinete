<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat_Productos extends Model
{
    protected $table = 'cat_productos';
    protected $fillable=[
        'id',
        'ref',
        'grupo',
        'cat',
        'marca',
        'proveedores',
        'nombre_es',
        'nombre_en',
        'desCorta_es',
        'desCorta_en',
        'desExtendida_es',
        'desExtendida_en',
        'precio_impuesto',
        'precio_txt',
        'novedad', 
        'oferta',
        'oferta_ini',
        'oferta_fin',
        'visitas',
        'mostrarPrecio',
        'cantidad_multiplo',
        'cantidad_medida',
        'cantidad_medida_txt',
        'peso',
        'stock',
        'stock_permitir_venta',
        'decimales',
        'multiplos',
        'unidad_medida',
        'enviogratis',
        'dis_ini',
        'dis_fin',
        'video',
        'codigo_proveedor',
        'codigo_control',
        'seo_title_es',
        'seo_description_es',
        'shopping',
        'fecha_alta',
        'fecha_mod',
        'id_Almacen',
        'stock_control'
    ];
}

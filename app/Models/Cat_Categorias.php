<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat_Categorias extends Model
{
    protected $table = 'cat_categorias';
    protected $fillable=[
        'id',
        'parent_id',
        'nombre_es',
        'descripcion_es',
        'nombre_en',
        'descripcion_en',
        'imagen',
        'destacada',
        'descuento',
        'icono', 
        'formato', 
        'plantilla',
        'cabecera',
        'orden',
        'meta_titulo_es',
        'meta_titulo_en',
        'meta_keywords_es',
        'meta_keywords_en',
        'meta_descripcion_es',
        'meta_descripcion_en',
        'visible',
        'amazon_feed_product_type',
        'amazon_node',
        'amazon_porcentaje',
        'google_cat_id',
        'precios_porcentaje',
        'precios_importe',
        'nivel',
        'fecha_mod',
        'catsolcli'
    ];
}

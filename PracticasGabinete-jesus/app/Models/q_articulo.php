<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_articulo extends Model
{
    protected $table ='qarticulo';

    protected $fillable=[
        'artcod',
        'artnom',
        'artmedcod',
        'artobs',
        'artivacod',
        'artcatcod',
        'artsit',
        'artstock',
        'artest4',
        'artcatcodw1',
        'artcodw2',
        'artmarcod',
        'artstocon',
        'artsolcli',
        'artivapor',
        'artrecpor',
        'artsigimp',
        'artfamcod',
        'artsfacod',
        'ofcfamcod',
        'ofcsfacod',
        'artgrucod'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_categoria extends Model
{
    protected $table= 'qcategoria';

    protected $fillable =[
        'carcod',
        'catnom',
        'catcatcod',
        'catima',
        'catsolcli'
    ];
    
}

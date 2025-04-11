<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_etiqueta extends Model
{
    protected $table= 'qetiqueta';

    protected $fillable=[
        'tagnom',
        'tagtip',
        'tagima'
    ];
}

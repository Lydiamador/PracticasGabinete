<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qanet_representante extends Model
{
    protected $table= 'qanet_representante';

    protected $fillable = [
        'rprcod',
        'rprnom',
        'rprema',
        'rprdelcod',
        'rprsyn',
        'rpralmcod',
        'rprtarcod',
        'rprporcom',
        'rprporcom2',
        'rprtel'
    ];
}

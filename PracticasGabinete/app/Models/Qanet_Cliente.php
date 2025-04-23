<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_Cliente extends Model
{
    protected $table = 'qanet_cliente';
    protected $fillable = [
        'id',
        'clicod',
        'clicencod',
        'clirprcod',
        'clivacod',
        'clitarcod',
        'cliivainc',
        'cliwebpedrpr',
        'clicatcod6',
        'clides',
        'clides2',
        'clides3',
        'clialmcod',
        'clidelcod',
        'clisyn',
        'clifecvis',
        'clihorvis',
        'clihoravi'
    ];
}

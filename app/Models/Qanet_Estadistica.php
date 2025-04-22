<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_Estadistica extends Model
{
    protected $table='qanet_estadistica';
    protected $fillable = [
        'estcon',
        'estalbnum',
        'estalbfec',
        'estalbimptot',
        'estclicod',
        'estcencod',
        'estartcod',
        'estcan',
        'estpre',
        'estfecrea'
    ];
}

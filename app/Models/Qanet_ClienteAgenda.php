<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_ClienteAgenda extends Model
{
    protected $table = 'qanet_clienteagenda';
    protected $fillable = [
        'id',
        'ageclicod',
        'agecencod',
        'agenom',
        'agecon',
        'agetelmov',
        'ageema',
    ];
}

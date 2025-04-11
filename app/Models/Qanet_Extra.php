<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_Extra extends Model
{
    protected $table = 'qanet_extra';
    protected $fillable = [
        'extcod',
        'extnom',
        'extpre',
        'extimpbar',
        'extimpcoc',
        'extimpcam',
        'extartcod',
        'exttip',
        'extcan'
    ];
}

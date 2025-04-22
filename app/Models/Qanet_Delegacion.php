<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_Delegacion extends Model
{
    protected   $table = 'qanet_delegacion';
    protected   $fillable = [
        'delcod',
        'delnom',
        'delrazsoc',
        'deldir',
        'delposcod',
        'delpob',
        'delpro',
        'delnif',
        'deltel',
        'delweb',
        'delalmcod',
        'delsyn'
    ];
}

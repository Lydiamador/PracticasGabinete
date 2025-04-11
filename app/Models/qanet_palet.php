<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class qanet_palet extends Model
{
    protected $table = 'qanet_palet';

    protected $fillable = [
        'palartcod',
        'palcod',
        'palcajcod',
        'palnom',
        'palnumcaj',
        'palbarcod',
        'paldef',
    ];
}

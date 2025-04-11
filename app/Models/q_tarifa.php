<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_tarifa extends Model
{
    protected $table = 'qtarifa';

    protected $fillable = [
        'tarcod',
        'tarnom'
    ];
}

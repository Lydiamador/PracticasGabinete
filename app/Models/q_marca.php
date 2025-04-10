<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_marca extends Model
{
    protected $table='qmarca';

    protected $fillable=[
        'marcod',
        'marnom'
    ];
}

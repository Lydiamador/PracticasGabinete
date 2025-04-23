<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_Caja extends Model
{
    protected $table = "qanet_caja";
    protected $fillable = [
        'cajartcod',
        'cajcod',
        'cajnom',
        'cajreldir',
        'cajbarcod',
        'cajdef',
        'cajtip',
        'cajvol',];
}

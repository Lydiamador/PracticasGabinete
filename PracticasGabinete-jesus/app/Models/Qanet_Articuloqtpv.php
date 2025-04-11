<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qanet_Articuloqtpv extends Model
{
    protected $table = 'qanet_articuloqtpv';
    protected $fillable = [
        'arttie',
        'artfamcon',
        'artcon',
        'artcod',
        'regmod',
        'regenv',
        'famima',
        'artima',
        'famcolfon',
        'famcolfue',
        'artnom',
        'artdelcod',
        'artfav',
        'artfav2',
        'artpos',
        'artenvtie'
    ];
}

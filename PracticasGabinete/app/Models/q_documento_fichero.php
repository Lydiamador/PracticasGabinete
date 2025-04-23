<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_documento_fichero extends Model
{
    protected $table = 'qdocumento_fichero';

    protected $fillable = [
        'qdocumento_id',
        'doctip',
        'docser',
        'doceje',
        'docnum',
        'docord',
        'docfichero'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class q_documento extends Model
{
    protected $table='qdocumento';

    protected $fillable=[
        'doctip',
        'docser',
        'doceje',
        'docnum',
        'docfec',
        'docclicod',
        'doccencod',
        'docimp',
        'docimptot',
        'docobs',
        'docfccser',
        'docfcceje',
        'docfccnum',
        'docimpcob',
        'docimppen',
        'doccob',
        'docenviado'
    ];

    protected function casts(): array
    {
        return [
            'docfec' => 'datetime',
        ];
    }

}

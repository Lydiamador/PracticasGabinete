<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_support extends Model
{
    protected $table= 'users_support';

    protected $fillable = [
      'usuclicod',
      'empresa',
      'cod_empresa',
      'programa',
      'terminal',
      'usuario',
      'telefono',
      'correo',
      'motivo',
      'accion',
      'tecnico',
      'evidencia1',
      'evidencia2',
      'evidencia3',
      'evidencia4',
      'evidencia5',
      'estado',
      'created_at',
      'updated_at',
      'id_agente'
    ];

    protected function casts(): array
    {
        return [
            'created_at' => 'datetime',
            'updated_at' => 'datetime'
        ];
    }


}

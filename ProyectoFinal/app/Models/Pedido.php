<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pedido extends Model
{
    use HasFactory;

    protected $table = "pedidos"; // NOMBRE DE LA TABLA

    // CAMPOS PERMITIDOS EN LA TABLA
    protected $fillable = [
        'id_usuario',
        'fecha',
        'total'
    ];

    // Fechas que Laravel convertirá automáticamente a objetos Carbon
    protected $dates = [
        'fecha'
    ];

    // UN PEDIDO PUEDE PERTENECER A UN SOLO USUARIO
    public function usuario(): BelongsTo
    {
        return $this->belongsTo(Usuario::class, "id_usuario"); // Relación BelongsTo con el modelo Usuario
    }
}

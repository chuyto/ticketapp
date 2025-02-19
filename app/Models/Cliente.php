<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    // Especificar la tabla asociada (opcional si sigue la convención de nombres)
    protected $table = 'clientes';

    // Definir los campos que se pueden llenar masivamente
    protected $fillable = [
        'nombre_cliente',
        'celular',
        'correo_electronico',
        'direccion',
    ];

    // Definir los campos que deben ser tratados como fechas
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}

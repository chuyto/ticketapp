<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReporteMantenimiento extends Model
{
    use HasFactory;

    protected $table = 'reportes_mantenimiento';

    protected $fillable = [
        'folio',
        'fecha',
        'cliente_id',
        'direccion',
        'telefono',
        'equipo',
        'mod',
        'modelo',
        'motor',
        'horas_trabajo',
        'servicio_solicitado',
        'diagnostico',
        'radiador_antioxidante',
        'limpieza_radiador',
        'bateria',
        'mangueras_general',
        'banda',
        'temp_equipo',
        'filtro_primario_diesel',
        'filtro_secundario_diesel',
        'filtro_aceite',
        'filtro_aire',
        'filtro_agua',
        'carga_alternador',
        'frecuencia_vacio',
        'voltaje_generacion',
        'presion_aceite',
        'frecuencia_con_carga',
        'voltaje_con_carga',
        'tiempo_prueba',
        'equipo_queda_en_modo',
        'actividades_realizadas',
        'nombre_tecnico',
        'firma_tecnico',
        'nombre_cliente',
        'firma_cliente',
    ];
    protected $casts = [
        'radiador_antioxidante' => 'boolean',
        'limpieza_radiador' => 'boolean',
        'mangueras_general' => 'boolean',
        'banda' => 'boolean',
    ];
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Método para generar el folio automáticamente
    public static function generarFolio()
    {
        $ultimoReporte = self::orderBy('id', 'desc')->first();
        $numero = $ultimoReporte ? (int) substr($ultimoReporte->folio, 3) : 0;
        return 'RP-' . str_pad($numero + 1, 2, '0', STR_PAD_LEFT);
    }
}

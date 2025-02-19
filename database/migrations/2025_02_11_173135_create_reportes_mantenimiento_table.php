<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesMantenimientoTable extends Migration
{
    public function up()
    {
        Schema::create('reportes_mantenimiento', function (Blueprint $table) {
            $table->id();
            $table->string('folio')->unique(); // Campo para el folio
            $table->date('fecha');
            $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade');
            $table->string('direccion')->nullable();
            $table->string('contacto')->nullable();
            $table->string('telefono')->nullable();
            $table->string('equipo');
            $table->string('mod');
            $table->string('modelo');
            $table->string('motor');
            $table->integer('horas_trabajo');
            $table->string('servicio_solicitado');
            $table->text('diagnostico')->nullable();
            $table->boolean('radiador_antioxidante')->default(false);
            $table->boolean('limpieza_radiador')->default(false);
            $table->string('bateria')->nullable();
            $table->boolean('mangueras_general')->default(false);
            $table->boolean('banda')->default(false);
            $table->string('temp_equipo')->nullable();
            $table->string('filtro_primario_diesel')->nullable();
            $table->string('filtro_secundario_diesel')->nullable();
            $table->string('filtro_aceite')->nullable();
            $table->string('filtro_aire')->nullable();
            $table->string('filtro_agua')->nullable();
            $table->string('carga_alternador')->nullable();
            $table->string('frecuencia_vacio')->nullable();
            $table->string('voltaje_generacion')->nullable();
            $table->string('presion_aceite')->nullable();
            $table->string('frecuencia_con_carga')->nullable();
            $table->string('voltaje_con_carga')->nullable();
            $table->string('tiempo_prueba')->nullable();
            $table->string('equipo_queda_en_modo')->nullable();
            $table->text('actividades_realizadas')->nullable();
            $table->string('nombre_tecnico')->nullable();
            $table->string('firma_tecnico')->nullable();
            $table->string('nombre_cliente')->nullable();
            $table->string('firma_cliente')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reportes_mantenimiento');
    }
}

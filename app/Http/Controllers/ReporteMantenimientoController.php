<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReporteMantenimiento;
use App\Models\Cliente;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf; // Importar la clase Pdf_

class ReporteMantenimientoController extends Controller
{
    /**
     * Mostrar una lista de todos los reportes de mantenimiento.
     */
    public function index()
    {
        $reportes = ReporteMantenimiento::all();
        return view('reportes.index', compact('reportes'));
    }

    /**
     * Mostrar los detalles de un reporte de mantenimiento específico.
     */
    public function show(ReporteMantenimiento $reporte)
    {
        // Cargar el reporte con su cliente asociado
        $reporte->load('cliente');
        return view('reportes.show', compact('reporte'));
    }

    /**
     * Mostrar el formulario para crear un nuevo reporte de mantenimiento.
     */
    public function create()
    {
        $clientes = Cliente::all();
        return view('reportes.create', compact('clientes'));
    }

    /**
     * Guardar un nuevo reporte de mantenimiento en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'equipo' => 'required|string',
            'mod' => 'required|string',
            'modelo' => 'required|string',
            'motor' => 'required|string',
            'horas_trabajo' => 'required|integer',
            'servicio_solicitado' => 'required|string',
            'diagnostico' => 'nullable|string',
            'radiador_antioxidante' => 'nullable|boolean',
            'limpieza_radiador' => 'nullable|boolean',
            'bateria' => 'nullable|string',
            'mangueras_general' => 'nullable|boolean',
            'banda' => 'nullable|boolean',
            'temp_equipo' => 'nullable|string',
            'filtro_primario_diesel' => 'nullable|string',
            'filtro_secundario_diesel' => 'nullable|string',
            'filtro_aceite' => 'nullable|string',
            'filtro_aire' => 'nullable|string',
            'filtro_agua' => 'nullable|string',
            'carga_alternador' => 'nullable|string',
            'frecuencia_vacio' => 'nullable|string',
            'voltaje_generacion' => 'nullable|string',
            'presion_aceite' => 'nullable|string',
            'frecuencia_con_carga' => 'nullable|string',
            'voltaje_con_carga' => 'nullable|string',
            'tiempo_prueba' => 'nullable|string',
            'equipo_queda_en_modo' => 'nullable|string',
            'actividades_realizadas' => 'nullable|string',
            'nombre_tecnico' => 'nullable|string',
            'firma_tecnico' => 'nullable|string',
            'nombre_cliente' => 'nullable|string',
            'firma_cliente' => 'nullable|string',
        ]);

        // Generar el folio automáticamente
        $folio = ReporteMantenimiento::generarFolio();

        // Guardar firma del técnico
        $firmaTecnicoPath = null;
        if ($request->firma_tecnico) {
            $firmaTecnicoPath = 'firmas/' . time() . '_tecnico.png';
            Storage::disk('public')->put($firmaTecnicoPath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firma_tecnico)));
        }

        // Guardar firma del cliente
        $firmaClientePath = null;
        if ($request->firma_cliente) {
            $firmaClientePath = 'firmas/' . time() . '_cliente.png';
            Storage::disk('public')->put($firmaClientePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firma_cliente)));
        }

        // Crear el reporte con todos los campos
        ReporteMantenimiento::create([
            'folio' => $folio,
            'fecha' => $request->fecha,
            'cliente_id' => $request->cliente_id,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'equipo' => $request->equipo,
            'mod' => $request->mod,
            'modelo' => $request->modelo,
            'motor' => $request->motor,
            'horas_trabajo' => $request->horas_trabajo,
            'servicio_solicitado' => $request->servicio_solicitado,
            'diagnostico' => $request->diagnostico,
            'radiador_antioxidante' => $request->radiador_antioxidante,
            'limpieza_radiador' => $request->limpieza_radiador,
            'bateria' => $request->bateria,
            'mangueras_general' => $request->mangueras_general,
            'banda' => $request->banda,
            'temp_equipo' => $request->temp_equipo,
            'filtro_primario_diesel' => $request->filtro_primario_diesel,
            'filtro_secundario_diesel' => $request->filtro_secundario_diesel,
            'filtro_aceite' => $request->filtro_aceite,
            'filtro_aire' => $request->filtro_aire,
            'filtro_agua' => $request->filtro_agua,
            'carga_alternador' => $request->carga_alternador,
            'frecuencia_vacio' => $request->frecuencia_vacio,
            'voltaje_generacion' => $request->voltaje_generacion,
            'presion_aceite' => $request->presion_aceite,
            'frecuencia_con_carga' => $request->frecuencia_con_carga,
            'voltaje_con_carga' => $request->voltaje_con_carga,
            'tiempo_prueba' => $request->tiempo_prueba,
            'equipo_queda_en_modo' => $request->equipo_queda_en_modo,
            'actividades_realizadas' => $request->actividades_realizadas,
            'nombre_tecnico' => $request->nombre_tecnico,
            'firma_tecnico' => $firmaTecnicoPath,
            'nombre_cliente' => $request->nombre_cliente,
            'firma_cliente' => $firmaClientePath,
        ]);

        return redirect()->route('reportes.index')->with('success', 'Reporte creado exitosamente.');
    }

    /**
     * Mostrar el formulario para editar un reporte de mantenimiento existente.
     */
    public function edit(ReporteMantenimiento $reporte)
    {
        // Cargar el reporte con su cliente asociado
        $reporte->load('cliente');
        $clientes = Cliente::all();
        return view('reportes.edit', compact('reporte', 'clientes'));
    }

    /**
     * Actualizar un reporte de mantenimiento en la base de datos.
     */
    public function update(Request $request, ReporteMantenimiento $reporte)
    {
        // Validar los datos del formulario
        $request->validate([
            'fecha' => 'required|date',
            'cliente_id' => 'required|exists:clientes,id',
            'direccion' => 'nullable|string',
            'telefono' => 'nullable|string',
            'equipo' => 'required|string',
            'mod' => 'required|string',
            'modelo' => 'required|string',
            'motor' => 'required|string',
            'horas_trabajo' => 'required|integer',
            'servicio_solicitado' => 'required|string',
            'diagnostico' => 'nullable|string',
            'radiador_antioxidante' => 'nullable|boolean',
            'limpieza_radiador' => 'nullable|boolean',
            'bateria' => 'nullable|string',
            'mangueras_general' => 'nullable|boolean',
            'banda' => 'nullable|boolean',
            'temp_equipo' => 'nullable|string',
            'filtro_primario_diesel' => 'nullable|string',
            'filtro_secundario_diesel' => 'nullable|string',
            'filtro_aceite' => 'nullable|string',
            'filtro_aire' => 'nullable|string',
            'filtro_agua' => 'nullable|string',
            'carga_alternador' => 'nullable|string',
            'frecuencia_vacio' => 'nullable|string',
            'voltaje_generacion' => 'nullable|string',
            'presion_aceite' => 'nullable|string',
            'frecuencia_con_carga' => 'nullable|string',
            'voltaje_con_carga' => 'nullable|string',
            'tiempo_prueba' => 'nullable|string',
            'equipo_queda_en_modo' => 'nullable|string',
            'actividades_realizadas' => 'nullable|string',
            'nombre_tecnico' => 'nullable|string',
            'firma_tecnico' => 'nullable|string',
            'nombre_cliente' => 'nullable|string',
            'firma_cliente' => 'nullable|string',
        ]);

        // Eliminar la firma anterior del técnico si existe
        if ($request->firma_tecnico && $reporte->firma_tecnico) {
            Storage::disk('public')->delete($reporte->firma_tecnico);
        }

        // Eliminar la firma anterior del cliente si existe
        if ($request->firma_cliente && $reporte->firma_cliente) {
            Storage::disk('public')->delete($reporte->firma_cliente);
        }

        // Guardar nueva firma del técnico
        $firmaTecnicoPath = $reporte->firma_tecnico;
        if ($request->firma_tecnico) {
            $firmaTecnicoPath = 'firmas/' . time() . '_tecnico.png';
            Storage::disk('public')->put($firmaTecnicoPath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firma_tecnico)));
        }

        // Guardar nueva firma del cliente
        $firmaClientePath = $reporte->firma_cliente;
        if ($request->firma_cliente) {
            $firmaClientePath = 'firmas/' . time() . '_cliente.png';
            Storage::disk('public')->put($firmaClientePath, base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $request->firma_cliente)));
        }

        // Actualizar el reporte con todos los campos
        $reporte->update([
            'fecha' => $request->fecha,
            'cliente_id' => $request->cliente_id,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'equipo' => $request->equipo,
            'mod' => $request->mod,
            'modelo' => $request->modelo,
            'motor' => $request->motor,
            'horas_trabajo' => $request->horas_trabajo,
            'servicio_solicitado' => $request->servicio_solicitado,
            'diagnostico' => $request->diagnostico,
            'radiador_antioxidante' => $request->radiador_antioxidante,
            'limpieza_radiador' => $request->limpieza_radiador,
            'bateria' => $request->bateria,
            'mangueras_general' => $request->mangueras_general,
            'banda' => $request->banda,
            'temp_equipo' => $request->temp_equipo,
            'filtro_primario_diesel' => $request->filtro_primario_diesel,
            'filtro_secundario_diesel' => $request->filtro_secundario_diesel,
            'filtro_aceite' => $request->filtro_aceite,
            'filtro_aire' => $request->filtro_aire,
            'filtro_agua' => $request->filtro_agua,
            'carga_alternador' => $request->carga_alternador,
            'frecuencia_vacio' => $request->frecuencia_vacio,
            'voltaje_generacion' => $request->voltaje_generacion,
            'presion_aceite' => $request->presion_aceite,
            'frecuencia_con_carga' => $request->frecuencia_con_carga,
            'voltaje_con_carga' => $request->voltaje_con_carga,
            'tiempo_prueba' => $request->tiempo_prueba,
            'equipo_queda_en_modo' => $request->equipo_queda_en_modo,
            'actividades_realizadas' => $request->actividades_realizadas,
            'nombre_tecnico' => $request->nombre_tecnico,
            'firma_tecnico' => $firmaTecnicoPath,
            'nombre_cliente' => $request->nombre_cliente,
            'firma_cliente' => $firmaClientePath,
        ]);

        return redirect()->route('reportes.index')->with('success', 'Reporte actualizado exitosamente.');
    }

    /**
     * Eliminar un reporte de mantenimiento de la base de datos.
     */
    public function destroy(ReporteMantenimiento $reporte)
    {
        // Eliminar las firmas si existen
        if ($reporte->firma_tecnico) {
            Storage::disk('public')->delete($reporte->firma_tecnico);
        }
        if ($reporte->firma_cliente) {
            Storage::disk('public')->delete($reporte->firma_cliente);
        }

        // Eliminar el reporte
        $reporte->delete();
        return redirect()->route('reportes.index')->with('success', 'Reporte eliminado exitosamente.');
    }

public function generarPDF(ReporteMantenimiento $reporte)
{
    // Cargar el reporte con su cliente
    $reporte->load('cliente');

    // Generar PDF con la vista
    $pdf = PDF::loadView('reportes.reporte-pdf', compact('reporte'));

    // Descargar el archivo
    return $pdf->stream('reporte-'.$reporte->folio.'.pdf');
}



}

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Mantenimiento</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .firma { width: 200px; height: 100px; border: 1px solid #000; text-align: center; }
        .footer {
            position: fixed;
            bottom: 10px;
            left: 0;
            right: 0;
            text-align: center;
            font-size: 10px;
            color: #666;
        }
        .page-number:before {
            content: "Página " counter(page);
        }

    </style>
</head>
<body>

    {{--


   <!-- Logo -->
   <div style="text-align: center;">

</div> --}}

<div style="text-align: right;">
    <img width="200" height="100" src="{{ public_path('images/logo.png') }}">
</div>
<h2 style="text-align: center;">Reporte de Mantenimiento</h2>

    <!-- Fecha y Hora de Generación -->
    <div style="text-align: right; margin-bottom: 20px;">
        <small>Generado el: {{ now()->setTimezone('America/Mexico_City')->format('d/m/Y H:i:s') }}</small>
    </div>

    <!-- Datos Generales -->
    <table>
        <tr>
            <th>Folio</th>
            <td>{{ $reporte->folio }}</td>
        </tr>
        <tr>
            <th>Fecha</th>
            <td>{{ $reporte->fecha }}</td>
        </tr>
        <tr>
            <th>Cliente</th>
            <td>{{ $reporte->cliente->nombre_cliente }}</td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td>{{ $reporte->direccion }}</td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td>{{ $reporte->telefono }}</td>
        </tr>
    </table>

    <!-- Datos del Equipo -->
    <h3>Datos del Equipo</h3>
    <table>
        <tr>
            <th>Equipo</th>
            <td>{{ $reporte->equipo }}</td>
        </tr>
        <tr>
            <th>Mod</th>
            <td>{{ $reporte->mod }}</td>
        </tr>
        <tr>
            <th>Modelo</th>
            <td>{{ $reporte->modelo }}</td>
        </tr>
        <tr>
            <th>Motor</th>
            <td>{{ $reporte->motor }}</td>
        </tr>
        <tr>
            <th>Horas de Trabajo</th>
            <td>{{ $reporte->horas_trabajo }}</td>
        </tr>
        <tr>
            <th>Servicio Solicitado</th>
            <td>{{ $reporte->servicio_solicitado }}</td>
        </tr>
    </table>

    <!-- Inspección del Equipo -->
    <h3>Inspección del Equipo</h3>
    <table>
        <tr>
            <th>Radiador Antioxidante</th>
            <td>{{ $reporte->radiador_antioxidante ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Limpieza Radiador</th>
            <td>{{ $reporte->limpieza_radiador ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Batería</th>
            <td>{{ $reporte->bateria }}</td>
        </tr>
        <tr>
            <th>Mangueras General</th>
            <td>{{ $reporte->mangueras_general ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Banda</th>
            <td>{{ $reporte->banda ? 'Sí' : 'No' }}</td>
        </tr>
        <tr>
            <th>Temperatura del Equipo</th>
            <td>{{ $reporte->temp_equipo }}</td>
        </tr>
        <tr>
            <th>Filtro Primario Diesel</th>
            <td>{{ $reporte->filtro_primario_diesel }}</td>
        </tr>
        <tr>
            <th>Filtro Secundario Diesel</th>
            <td>{{ $reporte->filtro_secundario_diesel }}</td>
        </tr>
        <tr>
            <th>Filtro Aceite</th>
            <td>{{ $reporte->filtro_aceite }}</td>
        </tr>
        <tr>
            <th>Filtro Aire</th>
            <td>{{ $reporte->filtro_aire }}</td>
        </tr>
        <tr>
            <th>Filtro Agua</th>
            <td>{{ $reporte->filtro_agua }}</td>
        </tr>
        <tr>
            <th>Carga Alternador</th>
            <td>{{ $reporte->carga_alternador }}</td>
        </tr>
        <tr>
            <th>Frecuencia Vacío</th>
            <td>{{ $reporte->frecuencia_vacio }}</td>
        </tr>
        <tr>
            <th>Voltaje Generación</th>
            <td>{{ $reporte->voltaje_generacion }}</td>
        </tr>
        <tr>
            <th>Presión Aceite</th>
            <td>{{ $reporte->presion_aceite }}</td>
        </tr>
        <tr>
            <th>Frecuencia con Carga</th>
            <td>{{ $reporte->frecuencia_con_carga }}</td>
        </tr>
        <tr>
            <th>Voltaje con Carga</th>
            <td>{{ $reporte->voltaje_con_carga }}</td>
        </tr>
        <tr>
            <th>Tiempo Prueba</th>
            <td>{{ $reporte->tiempo_prueba }}</td>
        </tr>
        <tr>
            <th>Equipo Queda en Modo</th>
            <td>{{ $reporte->equipo_queda_en_modo }}</td>
        </tr>
    </table>

    <!-- Actividades Realizadas -->
    <h3>Actividades Realizadas</h3>
    <p>{{ $reporte->actividades_realizadas }}</p>

    <!-- Firmas -->
    <h3>Firmas</h3>
    <table>
        <tr>
            <th>Firma Técnico</th>
            <th>Firma Cliente</th>
        </tr>
        <tr>
            <td class="firma">
                @if($reporte->firma_tecnico)
                    <img src="{{ public_path('storage/'.$reporte->firma_tecnico) }}" width="150">
                @else
                    <p>No disponible</p>
                @endif
            </td>
            <td class="firma">
                @if($reporte->firma_cliente)
                    <img src="{{ public_path('storage/'.$reporte->firma_cliente) }}" width="150">
                @else
                    <p>No disponible</p>
                @endif
            </td>
        </tr>
    </table>

    <!-- Footer con Número de Página -->
    <div class="footer">
        <span class="page-number"></span>
    </div>
</body>
</html>

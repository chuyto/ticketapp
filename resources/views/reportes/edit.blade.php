<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Editar Reporte de Mantenimiento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Formulario de Edición -->
                    <form action="{{ route('reportes.update', $reporte) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Datos Generales -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Datos Generales</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha:</label>
                                    <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $reporte->fecha) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente:</label>
                                    <select name="cliente_id" id="cliente_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}" {{ $reporte->cliente_id == $cliente->id ? 'selected' : '' }}>
                                                {{ $cliente->nombre_cliente }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección:</label>
                                    <input type="text" name="direccion" id="direccion" value="{{ old('direccion', $reporte->direccion) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono:</label>
                                    <input type="text" name="telefono" id="telefono" value="{{ old('telefono', $reporte->telefono) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>

                        <!-- Datos del Equipo -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Datos del Equipo</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="equipo" class="block text-sm font-medium text-gray-700">Equipo:</label>
                                    <input type="text" name="equipo" id="equipo" value="{{ old('equipo', $reporte->equipo) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="mod" class="block text-sm font-medium text-gray-700">Mod:</label>
                                    <input type="text" name="mod" id="mod" value="{{ old('mod', $reporte->mod) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo:</label>
                                    <input type="text" name="modelo" id="modelo" value="{{ old('modelo', $reporte->modelo) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="motor" class="block text-sm font-medium text-gray-700">Motor:</label>
                                    <input type="text" name="motor" id="motor" value="{{ old('motor', $reporte->motor) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="horas_trabajo" class="block text-sm font-medium text-gray-700">Horas de Trabajo:</label>
                                    <input type="number" name="horas_trabajo" id="horas_trabajo" value="{{ old('horas_trabajo', $reporte->horas_trabajo) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="servicio_solicitado" class="block text-sm font-medium text-gray-700">Servicio Solicitado:</label>
                                    <input type="text" name="servicio_solicitado" id="servicio_solicitado" value="{{ old('servicio_solicitado', $reporte->servicio_solicitado) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>

                        <!-- Inspección del Equipo -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Inspección del Equipo</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="radiador_antioxidante" class="block text-sm font-medium text-gray-700">Radiador Antioxidante:</label>
                                    <input type="hidden" name="radiador_antioxidante" value="0">
                                    <input type="checkbox" name="radiador_antioxidante" id="radiador_antioxidante" value="1" {{ $reporte->radiador_antioxidante ? 'checked' : '' }} class="mt-1">
                                </div>
                                <div>
                                    <label for="limpieza_radiador" class="block text-sm font-medium text-gray-700">Limpieza Radiador:</label>
                                    <input type="hidden" name="limpieza_radiador" value="0">
                                    <input type="checkbox" name="limpieza_radiador" id="limpieza_radiador" value="1" {{ $reporte->limpieza_radiador ? 'checked' : '' }} class="mt-1">
                                </div>
                                <div>
                                    <label for="bateria" class="block text-sm font-medium text-gray-700">Batería:</label>
                                    <input type="text" name="bateria" id="bateria" value="{{ old('bateria', $reporte->bateria) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="mangueras_general" class="block text-sm font-medium text-gray-700">Mangueras General:</label>
                                    <input type="hidden" name="mangueras_general" value="0">
                                    <input type="checkbox" name="mangueras_general" id="mangueras_general" value="1" {{ $reporte->mangueras_general ? 'checked' : '' }} class="mt-1">
                                </div>
                                <div>
                                    <label for="banda" class="block text-sm font-medium text-gray-700">Banda:</label>
                                    <input type="hidden" name="banda" value="0">
                                    <input type="checkbox" name="banda" id="banda" value="1" {{ $reporte->banda ? 'checked' : '' }} class="mt-1">
                                </div>
                                <div>
                                    <label for="temp_equipo" class="block text-sm font-medium text-gray-700">Temperatura del Equipo:</label>
                                    <input type="text" name="temp_equipo" id="temp_equipo" value="{{ old('temp_equipo', $reporte->temp_equipo) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="filtro_primario_diesel" class="block text-sm font-medium text-gray-700">Filtro Primario Diesel:</label>
                                    <input type="text" name="filtro_primario_diesel" id="filtro_primario_diesel" value="{{ old('filtro_primario_diesel', $reporte->filtro_primario_diesel) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="filtro_secundario_diesel" class="block text-sm font-medium text-gray-700">Filtro Secundario Diesel:</label>
                                    <input type="text" name="filtro_secundario_diesel" id="filtro_secundario_diesel" value="{{ old('filtro_secundario_diesel', $reporte->filtro_secundario_diesel) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="filtro_aceite" class="block text-sm font-medium text-gray-700">Filtro Aceite:</label>
                                    <input type="text" name="filtro_aceite" id="filtro_aceite" value="{{ old('filtro_aceite', $reporte->filtro_aceite) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="filtro_aire" class="block text-sm font-medium text-gray-700">Filtro Aire:</label>
                                    <input type="text" name="filtro_aire" id="filtro_aire" value="{{ old('filtro_aire', $reporte->filtro_aire) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="filtro_agua" class="block text-sm font-medium text-gray-700">Filtro Agua:</label>
                                    <input type="text" name="filtro_agua" id="filtro_agua" value="{{ old('filtro_agua', $reporte->filtro_agua) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="carga_alternador" class="block text-sm font-medium text-gray-700">Carga Alternador:</label>
                                    <input type="text" name="carga_alternador" id="carga_alternador" value="{{ old('carga_alternador', $reporte->carga_alternador) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="frecuencia_vacio" class="block text-sm font-medium text-gray-700">Frecuencia Vacío:</label>
                                    <input type="text" name="frecuencia_vacio" id="frecuencia_vacio" value="{{ old('frecuencia_vacio', $reporte->frecuencia_vacio) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="voltaje_generacion" class="block text-sm font-medium text-gray-700">Voltaje Generación:</label>
                                    <input type="text" name="voltaje_generacion" id="voltaje_generacion" value="{{ old('voltaje_generacion', $reporte->voltaje_generacion) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="presion_aceite" class="block text-sm font-medium text-gray-700">Presión Aceite:</label>
                                    <input type="text" name="presion_aceite" id="presion_aceite" value="{{ old('presion_aceite', $reporte->presion_aceite) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="frecuencia_con_carga" class="block text-sm font-medium text-gray-700">Frecuencia con Carga:</label>
                                    <input type="text" name="frecuencia_con_carga" id="frecuencia_con_carga" value="{{ old('frecuencia_con_carga', $reporte->frecuencia_con_carga) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="voltaje_con_carga" class="block text-sm font-medium text-gray-700">Voltaje con Carga:</label>
                                    <input type="text" name="voltaje_con_carga" id="voltaje_con_carga" value="{{ old('voltaje_con_carga', $reporte->voltaje_con_carga) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="tiempo_prueba" class="block text-sm font-medium text-gray-700">Tiempo Prueba:</label>
                                    <input type="text" name="tiempo_prueba" id="tiempo_prueba" value="{{ old('tiempo_prueba', $reporte->tiempo_prueba) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="equipo_queda_en_modo" class="block text-sm font-medium text-gray-700">Equipo Queda en Modo:</label>
                                    <input type="text" name="equipo_queda_en_modo" id="equipo_queda_en_modo" value="{{ old('equipo_queda_en_modo', $reporte->equipo_queda_en_modo) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                </div>
                                <div>
                                    <label for="actividades_realizadas" class="block text-sm font-medium text-gray-700">Actividades Realizadas:</label>
                                    <textarea name="actividades_realizadas" id="actividades_realizadas" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('actividades_realizadas', $reporte->actividades_realizadas) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Firmas (Solo Lectura) -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Firmas</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Firma del Técnico:</label>
                                    @if ($reporte->firma_tecnico)
                                        <img src="{{ asset('storage/' . $reporte->firma_tecnico) }}" alt="Firma del Técnico" class="w-48 h-auto border border-gray-300 rounded-md">
                                    @else
                                        <p class="text-gray-500">Sin firma</p>
                                    @endif
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Firma del Cliente:</label>
                                    @if ($reporte->firma_cliente)
                                        <img src="{{ asset('storage/' . $reporte->firma_cliente) }}" alt="Firma del Cliente" class="w-48 h-auto border border-gray-300 rounded-md">
                                    @else
                                        <p class="text-gray-500">Sin firma</p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Botón de Guardar -->
                        <div class="flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

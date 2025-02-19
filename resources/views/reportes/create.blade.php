<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Crear Reporte de Mantenimiento
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    <form action="{{ route('reportes.store') }}" method="POST" id="reporte-form">
                        @csrf

                        <!-- Sección 1: Datos del Cliente -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Datos del Cliente</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="fecha" class="block text-sm font-medium text-gray-700">Fecha</label>
                                    <input type="date" name="fecha" id="fecha" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="cliente_id" class="block text-sm font-medium text-gray-700">Cliente</label>
                                    <select name="cliente_id" id="cliente_id" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                        <option value="">Selecciona un cliente</option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{ $cliente->id }}">{{ $cliente->nombre_cliente }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                                    <input type="text" name="direccion" id="direccion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                                </div>
                                <div>
                                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                                    <input type="text" name="telefono" id="telefono" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 2: Datos del Equipo -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Datos del Equipo</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="equipo" class="block text-sm font-medium text-gray-700">Equipo</label>
                                    <input type="text" name="equipo" id="equipo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="mod" class="block text-sm font-medium text-gray-700">Mod</label>
                                    <input type="text" name="mod" id="mod" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                                    <input type="text" name="modelo" id="modelo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="motor" class="block text-sm font-medium text-gray-700">Motor</label>
                                    <input type="text" name="motor" id="motor" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="horas_trabajo" class="block text-sm font-medium text-gray-700">Horas de Trabajo</label>
                                    <input type="number" name="horas_trabajo" id="horas_trabajo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="servicio_solicitado" class="block text-sm font-medium text-gray-700">Servicio Solicitado</label>
                                    <input type="text" name="servicio_solicitado" id="servicio_solicitado" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                                </div>
                                <div>
                                    <label for="diagnostico" class="block text-sm font-medium text-gray-700">Diagnóstico</label>
                                    <textarea name="diagnostico" id="diagnostico" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Sección 3: Inspección del Equipo -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Inspección del Equipo</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                               <!-- Radiador Antioxidante -->
                                <div>
                                    <label for="radiador_antioxidante" class="block text-sm font-medium text-gray-700">Radiador Antioxidante</label>
                                    <input type="hidden" name="radiador_antioxidante" value="0">
                                    <input type="checkbox" name="radiador_antioxidante" id="radiador_antioxidante" value="1" class="mt-1">
                                </div>

                                <!-- Limpieza Radiador -->
                                <div>
                                    <label for="limpieza_radiador" class="block text-sm font-medium text-gray-700">Limpieza Radiador</label>
                                    <input type="hidden" name="limpieza_radiador" value="0">
                                    <input type="checkbox" name="limpieza_radiador" id="limpieza_radiador" value="1" class="mt-1">
                                </div>

                                <!-- Mangueras General -->
                                <div>
                                    <label for="mangueras_general" class="block text-sm font-medium text-gray-700">Mangueras General</label>
                                    <input type="hidden" name="mangueras_general" value="0">
                                    <input type="checkbox" name="mangueras_general" id="mangueras_general" value="1" class="mt-1">
                                </div>

                                <!-- Banda -->
                                <div>
                                    <label for="banda" class="block text-sm font-medium text-gray-700">Banda</label>
                                    <input type="hidden" name="banda" value="0">
                                    <input type="checkbox" name="banda" id="banda" value="1" class="mt-1">
                                </div>
                                <div>
                                    <label for="bateria" class="block text-sm font-medium text-gray-700">Batería</label>
                                    <input type="text" name="bateria" id="bateria" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="temp_equipo" class="block text-sm font-medium text-gray-700">Temp. Equipo</label>
                                    <input type="text" name="temp_equipo" id="temp_equipo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="filtro_primario_diesel" class="block text-sm font-medium text-gray-700">Filtro Primario Diesel</label>
                                    <input type="text" name="filtro_primario_diesel" id="filtro_primario_diesel" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="filtro_secundario_diesel" class="block text-sm font-medium text-gray-700">Filtro Secundario Diesel</label>
                                    <input type="text" name="filtro_secundario_diesel" id="filtro_secundario_diesel" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="filtro_aceite" class="block text-sm font-medium text-gray-700">Filtro de Aceite</label>
                                    <input type="text" name="filtro_aceite" id="filtro_aceite" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="filtro_aire" class="block text-sm font-medium text-gray-700">Filtro de Aire</label>
                                    <input type="text" name="filtro_aire" id="filtro_aire" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="filtro_agua" class="block text-sm font-medium text-gray-700">Filtro de Agua</label>
                                    <input type="text" name="filtro_agua" id="filtro_agua" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="carga_alternador" class="block text-sm font-medium text-gray-700">Carga Alternador</label>
                                    <input type="text" name="carga_alternador" id="carga_alternador" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="frecuencia_vacio" class="block text-sm font-medium text-gray-700">Frecuencia en Vacío</label>
                                    <input type="text" name="frecuencia_vacio" id="frecuencia_vacio" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="voltaje_generacion" class="block text-sm font-medium text-gray-700">Voltaje de Generación</label>
                                    <input type="text" name="voltaje_generacion" id="voltaje_generacion" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="presion_aceite" class="block text-sm font-medium text-gray-700">Presión de Aceite</label>
                                    <input type="text" name="presion_aceite" id="presion_aceite" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="frecuencia_con_carga" class="block text-sm font-medium text-gray-700">Frecuencia con Carga</label>
                                    <input type="text" name="frecuencia_con_carga" id="frecuencia_con_carga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="voltaje_con_carga" class="block text-sm font-medium text-gray-700">Voltaje con Carga</label>
                                    <input type="text" name="voltaje_con_carga" id="voltaje_con_carga" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="tiempo_prueba" class="block text-sm font-medium text-gray-700">Tiempo de Prueba</label>
                                    <input type="text" name="tiempo_prueba" id="tiempo_prueba" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                                <div>
                                    <label for="equipo_queda_en_modo" class="block text-sm font-medium text-gray-700">Equipo Queda en Modo</label>
                                    <input type="text" name="equipo_queda_en_modo" id="equipo_queda_en_modo" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>
                            </div>
                        </div>

                        <!-- Sección 4: Actividades Realizadas -->
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-700 mb-2">Actividades Realizadas</h3>
                            <div>
                                <textarea name="actividades_realizadas" id="actividades_realizadas" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                            </div>
                        </div>

                       <!-- Pads de Firma -->
                       <div class="py-12 px-4 sm:px-6 lg:px-8">
                        <div class="firma-container">
                            <!-- Firma del Técnico -->
                            <div class="firma">
                                <label for="firma_tecnico" class="block text-sm font-medium text-gray-700">Firma del Técnico</label>
                                <canvas id="firma-tecnico-pad"></canvas>
                                <input type="hidden" name="firma_tecnico" id="firma_tecnico">
                                <button type="button" onclick="limpiarFirma('tecnico')" class="mt-2 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Limpiar Firma
                                </button>
                            </div>
                            <!-- Firma del Cliente -->
                            <div class="firma">
                                <label for="firma_cliente" class="block text-sm font-medium text-gray-700">Firma del Cliente</label>
                                <canvas id="firma-cliente-pad"></canvas>
                                <input type="hidden" name="firma_cliente" id="firma_cliente">
                                <button type="button" onclick="limpiarFirma('cliente')" class="mt-2 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-900 focus:outline-none focus:border-red-900 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    Limpiar Firma
                                </button>
                            </div>
                        </div>
                    </div>


                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Guardar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Estilos generales */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Contenedor de las firmas */
        .firma-container {
            display: flex;
            gap: 20px;
            flex-wrap: wrap; /* Permite que los elementos se acomoden mejor en pantallas pequeñas */
            justify-content: space-between; /* Asegura que haya espacio entre los pads */
            overflow: hidden; /* Evita que los pads sobresalgan del contenedor */
        }

        .firma-container .firma {
            flex: 1;
            min-width: 250px; /* Asegura que cada firma tenga un tamaño mínimo */
        }

        /* Tamaños en desktop */
        #firma-tecnico-pad, #firma-cliente-pad {
            width: 100%;
            height: 150px; /* Ajuste para desktop */
            border: 1px solid #ccc;
            border-radius: 8px;
            touch-action: none; /* Evita que el navegador maneje eventos táctiles por defecto */
            display: block; /* Elimina cualquier margen extra que pueda causar problemas */
        }

        /* Ajustes en móvil */
        @media (max-width: 768px) {
            .firma-container {
                flex-direction: column; /* Cambiar a columna en pantallas pequeñas */
                gap: 20px; /* Espacio entre los pads */
            }

            .firma-container .firma {
                width: 100%; /* Hacer que cada firma ocupe el 100% del ancho disponible */
                margin-bottom: 20px; /* Espacio entre los pads */
            }

            #firma-tecnico-pad, #firma-cliente-pad {
                height: 250px; /* Aumentar la altura de los pads en móviles */
            }
        }
    </style>



    <!-- Incluir la librería Signature Pad -->
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        function ajustarDimensionesCanvas(canvas) {
            const rect = canvas.getBoundingClientRect();
            canvas.width = rect.width * devicePixelRatio; // Ajusta la resolución interna al zoom del dispositivo
            canvas.height = rect.height * devicePixelRatio;
            canvas.style.width = `${rect.width}px`; // Mantén el tamaño visual igual
            canvas.style.height = `${rect.height}px`;
        }

        // Inicializar Signature Pad para el técnico
        const firmaTecnicoPad = new SignaturePad(document.getElementById('firma-tecnico-pad'), {
            backgroundColor: 'rgba(255, 255, 255, 0)', // Fondo transparente
            penColor: 'rgb(0, 0, 0)', // Color del lápiz (negro)
        });
        ajustarDimensionesCanvas(document.getElementById('firma-tecnico-pad'));

        // Inicializar Signature Pad para el cliente
        const firmaClientePad = new SignaturePad(document.getElementById('firma-cliente-pad'), {
            backgroundColor: 'rgba(255, 255, 255, 0)', // Fondo transparente
            penColor: 'rgb(0, 0, 0)', // Color del lápiz (negro)
        });
        ajustarDimensionesCanvas(document.getElementById('firma-cliente-pad'));

        // Función para limpiar una firma
        window.limpiarFirma = function (tipo) {
            if (tipo === 'tecnico') {
                firmaTecnicoPad.clear(); // Limpiar el pad del técnico
                document.getElementById('firma_tecnico').value = ''; // Limpiar el campo oculto
            } else if (tipo === 'cliente') {
                firmaClientePad.clear(); // Limpiar el pad del cliente
                document.getElementById('firma_cliente').value = ''; // Limpiar el campo oculto
            }
        };

        // Guardar las firmas como imágenes en base64 al enviar el formulario
        document.querySelector('#reporte-form').addEventListener('submit', function (event) {
            // Guardar la firma del técnico si no está vacía
            if (!firmaTecnicoPad.isEmpty()) {
                document.getElementById('firma_tecnico').value = firmaTecnicoPad.toDataURL();
            }
            // Guardar la firma del cliente si no está vacía
            if (!firmaClientePad.isEmpty()) {
                document.getElementById('firma_cliente').value = firmaClientePad.toDataURL();
            }
            // Permitir que el formulario se envíe normalmente
            return true;
        });

        // Escuchar cambios de tamaño de la ventana
        window.addEventListener('resize', function () {
            ajustarDimensionesCanvas(document.getElementById('firma-tecnico-pad'));
            ajustarDimensionesCanvas(document.getElementById('firma-cliente-pad'));
        });

            // Autocompletar dirección y teléfono al seleccionar un cliente
            document.getElementById('cliente_id').addEventListener('change', function () {
                const clienteId = this.value;
                if (clienteId) {
                    fetch(`/clientes/${clienteId}`)
                        .then(response => response.json())
                        .then(data => {
                            document.getElementById('direccion').value = data.direccion;
                            document.getElementById('telefono').value = data.celular;
                        });
                } else {
                    document.getElementById('direccion').value = '';
                    document.getElementById('telefono').value = '';
                }
            });
        });
    </script>
</x-app-layout>

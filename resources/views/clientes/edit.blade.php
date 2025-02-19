<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Cliente
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nombre_cliente" class="block text-sm font-medium text-gray-700">Nombre del Cliente</label>
                            <input type="text" name="nombre_cliente" id="nombre_cliente" value="{{ old('nombre_cliente', $cliente->nombre_cliente) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="celular" class="block text-sm font-medium text-gray-700">Celular</label>
                            <input type="text" name="celular" id="celular" value="{{ old('celular', $cliente->celular) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="correo_electronico" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" name="correo_electronico" id="correo_electronico" value="{{ old('correo_electronico', $cliente->correo_electronico) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                        </div>

                        <div class="mb-4">
                            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
                            <textarea name="direccion" id="direccion" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>{{ old('direccion', $cliente->direccion) }}</textarea>
                        </div>

                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

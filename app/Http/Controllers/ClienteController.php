<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Mostrar todos los clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Mostrar formulario para crear un cliente
    public function create()
    {
        return view('clientes.create');
    }

    // Guardar un nuevo cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'celular' => 'required|string|max:15',
            'correo_electronico' => 'required|email|unique:clientes',
            'direccion' => 'required|string',
        ]);

        Cliente::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    // Mostrar formulario para editar un cliente
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    // Actualizar un cliente existente
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre_cliente' => 'required|string|max:255',
            'celular' => 'required|string|max:15',
            'correo_electronico' => 'required|email|unique:clientes,correo_electronico,' . $cliente->id,
            'direccion' => 'required|string',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    // Eliminar un cliente
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }

    public function show($id)
    {
        // Buscar el cliente por ID
        $cliente = Cliente::find($id);

        // Si el cliente no existe, devolver un error 404
        if (!$cliente) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        // Devolver los datos del cliente en formato JSON
        return response()->json([
            'direccion' => $cliente->direccion,
            'celular' => $cliente->celular,
        ]);
    }
}

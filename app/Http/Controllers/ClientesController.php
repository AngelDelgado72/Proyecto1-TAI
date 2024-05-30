<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', [
            'clientes' => $clientes
        ]);
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'rfc' => 'required',
        ]);

        $cliente = new Cliente();
        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->rfc = $request->input('rfc');
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'rfc' => 'required',
        ]);

        $cliente->nombre = $request->input('nombre');
        $cliente->correo = $request->input('correo');
        $cliente->telefono = $request->input('telefono');
        $cliente->direccion = $request->input('direccion');
        $cliente->rfc = $request->input('rfc');
        $cliente->save();
        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
    }


}

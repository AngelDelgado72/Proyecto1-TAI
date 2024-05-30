<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Inventario;
use Illuminate\Http\Request;

class InventariosController extends Controller
{
    public function index()
    {
        $inventarios = Inventario::all();
        return view('inventarios.index', [
            'inventarios' => $inventarios
        ]);
    }

    public function create()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('inventarios.create',
            [
                'productos' => $productos,
                'categorias' => $categorias
            ]
        );
    }

    public function store(Request $request)
    {
        // validar los datos
        $request->validate([
            'producto_id' => 'required',
            'categoria_id' => 'required',
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
            'movimiento' => 'required',
            'motivo' => 'required',
            'cantidad' => 'required',
        ]);

        $inventario = new Inventario();
        $inventario->producto_id = $request->input('producto_id');
        $inventario->categoria_id = $request->input('categoria_id');
        $inventario->fecha_entrada = $request->input('fecha_entrada');
        $inventario->fecha_salida = $request->input('fecha_salida');
        $inventario->movimiento = $request->input('movimiento');
        $inventario->motivo = $request->input('motivo');
        $inventario->cantidad = $request->input('cantidad');
        $inventario->save();

        return redirect()->route('inventarios.index')->with('success', 'Inventario creado exitosamente');
    }

    public function show(Inventario $inventario)
    {
        return view('inventarios.show', compact('inventario'));
    }

    public function edit(Inventario $inventario)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        return view('inventarios.edit', [
            'inventario' => $inventario,
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }

    public function update(Request $request, Inventario $inventario)
    {
        // validar los datos
        $request->validate([
            'producto_id' => 'required',
            'categoria_id' => 'required',
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
            'movimiento' => 'required',
            'motivo' => 'required',
            'cantidad' => 'required',
        ]);

        $inventario->producto_id = $request->input('producto_id');
        $inventario->categoria_id = $request->input('categoria_id');
        $inventario->fecha_entrada = $request->input('fecha_entrada');
        $inventario->fecha_salida = $request->input('fecha_salida');
        $inventario->movimiento = $request->input('movimiento');
        $inventario->motivo = $request->input('motivo');
        $inventario->cantidad = $request->input('cantidad');
        $inventario->save();
        return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado exitosamente');
    }


}

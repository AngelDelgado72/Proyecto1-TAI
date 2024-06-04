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
            'motivo' => 'required',
            'cantidad' => 'required',
        ]);

        $inventario = new Inventario();
        $inventario->producto_id = $request->input('producto_id');
        $inventario->fecha_entrada = now();
        $inventario->movimiento = 'Entrada'; // 'Entrada' o 'Salida
        $inventario->motivo = $request->input('motivo');
        $inventario->cantidad = $request->input('cantidad');
        $inventario->save();

        return redirect()->route('inventarios.index')->with('success', 'Inventario creado exitosamente');
    }

    public function show(Inventario $inventario)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        // dd($inventario);
        return view('inventarios.show', [
            'inventario' => $inventario,
            'productos' => $productos,
            'categorias' => $categorias
        ]);
    }

    public function edit(Inventario $inventario)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        // dd($inventario);
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
            'movimiento' => 'required',
            'motivo' => 'required',
            'cantidad' => 'required',
        ]);

        $cantidad = Inventario::where('id', $inventario->id)->first()->cantidad;
        // revisa que el producto tenga suficiente cantidad en inventario para quitarse, sino retorna un error
        if ($request->input('movimiento') == 'Salida' && $cantidad < $request->input('cantidad')) {
            return back()->withErrors(['cantidad' => 'No hay suficiente cantidad en inventario para realizar la salida'])->withInput();
        }

        if ($request->input('movimiento') == 'Salida') {
            $inventario->fecha_salida = now();
            $inventario->cantidad = $cantidad - $request->input('cantidad');
        }else{
            $inventario->fecha_entrada = now();
            $inventario->cantidad = $cantidad + $request->input('cantidad');
        }

        $inventario->producto_id = $request->input('producto_id');
        $inventario->movimiento = $request->input('movimiento');
        $inventario->motivo = $request->input('motivo');
        $inventario->save();
        return redirect()->route('inventarios.index')->with('success', 'Inventario actualizado exitosamente');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventarios.index')->with('success', 'Inventario eliminado exitosamente');
    }


}

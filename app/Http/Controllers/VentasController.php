<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class VentasController extends Controller
{
    public function index()
    {
        $ventas = Venta::all();
        return view('ventas.index', [
            'ventas' => $ventas
        ]);
    }

    public function create()
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        
        return view('ventas.create',
            [
                'productos' => $productos,
                'categorias' => $categorias,
                'clientes' => $clientes
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'categoria_id' => 'required',
            'cliente_id' => 'required',
            'fecha_venta' => 'required',
            'subtotal' => 'required',
            'iva' => 'required',
            'total' => 'required',
        ]);

        $venta = new Venta();
        $venta->producto_id = $request->input('producto_id');
        $venta->categoria_id = $request->input('categoria_id');
        $venta->cliente_id = $request->input('cliente_id');
        $venta->fecha_venta = $request->input('fecha_venta');
        $venta->subtotal = $request->input('subtotal');
        $venta->iva = $request->input('iva');
        $venta->total = $request->input('total');
        $venta->save();

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente');

    }

    public function show(Venta $venta)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        return view('ventas.show',
            [
                'venta' => $venta,
                'productos' => $productos,
                'categorias' => $categorias,
                'clientes' => $clientes
            ]
        );
    }

    public function edit(Venta $venta)
    {
        $productos = Producto::all();
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        return view('ventas.edit',
            [
                'venta' => $venta,
                'productos' => $productos,
                'categorias' => $categorias,
                'clientes' => $clientes
            ]
        );
    }

    public function update(Request $request, Venta $venta)
    {
         // validar los datos
         $request->validate([
            'producto_id' => 'required',
            'categoria_id' => 'required',
            'cliente_id' => 'required',
            'fecha_venta' => 'required',
            'subtotal' => 'required',
            'iva' => 'required',
            'total' => 'required',
        ]);

        $venta->producto_id = $request->input('producto_id');
        $venta->categoria_id = $request->input('categoria_id');
        $venta->cliente_id = $request->input('cliente_id');
        $venta->fecha_venta = $request->input('fecha_venta');
        $venta->subtotal = $request->input('subtotal');
        $venta->iva = $request->input('iva');
        $venta->total = $request->input('total');
        $venta->save();

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente');

    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente');
    }

}




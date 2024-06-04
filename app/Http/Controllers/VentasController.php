<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Inventario;
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
        $inventarios = Inventario::where('cantidad', '>', 0)->get();
        $categorias = Categoria::all();
        $clientes = Cliente::all();
        
        return view('ventas.create',
            [
                'inventarios' => $inventarios,
                'categorias' => $categorias,
                'clientes' => $clientes
            ]
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required',
            'cliente_id' => 'required',
            'cantidad' => 'required',
        ]);

        // revisa que el producto tenga suficiente cantidad en inventario para la venta, sino retorna un error
        $inventario = Inventario::where('producto_id', $request->input('producto_id'))->first();
        if ($inventario->cantidad < $request->input('cantidad')) {
            return back()->withErrors(['cantidad' => 'No hay suficiente cantidad en inventario para realizar la venta'])->withInput();
        }else{
            $inventario->cantidad = $inventario->cantidad - $request->input('cantidad');
            $inventario->save();
        }

        $subtotal = $inventario->producto->precio_venta * $request->input('cantidad');
        $iva = $subtotal * 0.16;
        $total = $subtotal + $iva;

        // crea la venta
        $venta = new Venta();
        $venta->producto_id = $request->input('producto_id');
        $venta->cliente_id = $request->input('cliente_id');
        $venta->fecha_venta = now();
        $venta->cantidad = $request->input('cantidad');
        $venta->subtotal = $subtotal;
        $venta->iva = $iva;
        $venta->total = $total;
        $venta->save();

        return redirect()->route('ventas.index');

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
            'cliente_id' => 'required',
            // la cantidad debe ser mayor a 0
            'cantidad' => 'required|gt:0',
        ]);

        $inventario = Inventario::where('producto_id', $venta->producto_id)->first();

        // si la cantidad es menor a la original, se debe aumentar la cantidad en inventario 
        if ($request->input('cantidad') < $venta->cantidad) {
            $cantidad_aumentar = $venta->cantidad - $request->input('cantidad');
            $inventario->cantidad = $inventario->cantidad + $cantidad_aumentar;
            $inventario->save();
        }else{
            // si la cantidad es mayor a la original, se debe disminuir la cantidad en inventario y validar que haya suficiente cantidad en inventario
            $cantidad_disminuir = $request->input('cantidad') - $venta->cantidad;
            if ($inventario->cantidad < $cantidad_disminuir) {
                return back()->withErrors(['cantidad' => 'No hay suficiente cantidad en inventario para realizar la venta'])->withInput();
            }else{
                $inventario->cantidad = $inventario->cantidad - $cantidad_disminuir;
                $inventario->save();
            }
        }

        $subtotal = $inventario->producto->precio_venta * $request->input('cantidad');
        $iva = $subtotal * 0.16;
        $total = $subtotal + $iva;

        // actualiza la venta
        $venta->cliente_id = $request->input('cliente_id');
        $venta->cantidad = $request->input('cantidad');
        $venta->subtotal = $subtotal;
        $venta->iva = $iva;
        $venta->total = $total;
        $venta->save();

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente');

    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente');
    }

}




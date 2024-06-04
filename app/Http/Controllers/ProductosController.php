<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ProductosController extends Controller
{
    public function index()
    {
        // buscar en la base de datos todos los productos
        $productos = Producto::all();

        return view('productos.index', [
            'productos' => $productos
        ]);
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('productos.create',
            [
                'categorias' => $categorias
            ]
        );
    }

    public function show(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.show', 
            [
                'producto' => $producto,
                'categorias' => $categorias
            ]
        );
    }

    public function store(Request $request)
    {
        // validar los datos
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'precio_venta' => 'required',
            'precio_compra' => 'required',
            'color' => 'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
        ]);

        // guardar en la base de datos
        Producto::create($request->all());

        // redireccionar
        return redirect()->route('productos.index');
    }

    public function edit(Producto $producto)
    {
        $categorias = Categoria::all();
        return view('productos.edit', 
            [
                'producto' => $producto,
                'categorias' => $categorias
            ]
        );
    }

    public function update(Request $request, Producto $producto)
    {
        // validar los datos
        $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required',
            'precio_venta' => 'required',
            'precio_compra' => 'required',
            'color' => 'required',
            'descripcion_corta' => 'required',
            'descripcion_larga' => 'required',
        ]);

        // actualizar en la base de datos
        $producto->update($request->all());

        // redireccionar
        return redirect()->route('productos.index');
    }

    public function destroy(Producto $producto)
    {
        // eliminar de la base de datos
        $producto->delete();

        // redireccionar
        return redirect()->route('productos.index');
    }


}

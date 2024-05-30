<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', [
            'categorias' => $categorias
        ]);
    }

    public function create()
    {
        return view('categorias.create');
    }

    // protected $fillable = ['nombre'];

    public function show(Categoria $categoria)
    {
        return view('categorias.show', compact('categoria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required'
        ]);

        Categoria::create($request->all());

        return redirect()->route('categorias.index');
    }

    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        // validar los datos
        $request->validate([
            'nombre' => 'required',
        ]);

        // actualizar en la base de datos
        $categoria->update($request->all());

        // redireccionar
        return redirect()->route('categorias.index');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
        return redirect()->route('categorias.index');
    }


    

        
    


        
}

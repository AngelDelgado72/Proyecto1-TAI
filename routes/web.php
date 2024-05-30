<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\inventariosController;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

//Ruta index para mostrar productos
Route::get('/productos', [ProductosController::class, 'index'])->name('productos.index');
//Ruta create para mostrar formulario de creación
Route::get('/productos/create', [ProductosController::class, 'create'])->name('productos.create');
//Ruta show para mostrar un producto
Route::get('/productos/{producto}', [ProductosController::class, 'show'])->name('productos.show');
//Ruta store para guardar un producto
Route::post('/productos', [ProductosController::class, 'store'])->name('productos.store');
//Ruta edit para mostrar formulario de edición
Route::get('/productos/{producto}/edit', [ProductosController::class, 'edit'])->name('productos.edit');
//Ruta update para actualizar un producto
Route::put('/productos/{producto}', [ProductosController::class, 'update'])->name('productos.update');
//Ruta destroy para eliminar un producto
Route::delete('/productos/{producto}', [ProductosController::class, 'destroy'])->name('productos.destroy');

//Ruta index para mostrar categorias
Route::get('/categorias', [CategoriasController::class, 'index'])->name('categorias.index');
//Ruta create para mostrar formulario de creación
Route::get('/categorias/create', [CategoriasController::class, 'create'])->name('categorias.create');
//Ruta show para mostrar una categoria
Route::get('/categorias/{categoria}', [CategoriasController::class, 'show'])->name('categorias.show');
//Ruta store para guardar una categoria
Route::post('/categorias', [CategoriasController::class, 'store'])->name('categorias.store');
//Ruta edit para mostrar formulario de edición
Route::get('/categorias/{categoria}/edit', [CategoriasController::class, 'edit'])->name('categorias.edit');
//Ruta update para actualizar una categoria
Route::put('/categorias/{categoria}', [CategoriasController::class, 'update'])->name('categorias.update');
//Ruta destroy para eliminar una categoria
Route::delete('/categorias/{categoria}', [CategoriasController::class, 'destroy'])->name('categorias.destroy');

//Ruta index para mostrar ventas
Route::get('/ventas', [VentasController::class, 'index'])->name('ventas.index');
//Ruta create para mostrar formulario de creación
Route::get('/ventas/create', [VentasController::class, 'create'])->name('ventas.create');
//Ruta show para mostrar una venta
Route::get('/ventas/{venta}', [VentasController::class, 'show'])->name('ventas.show');
//Ruta store para guardar una venta
Route::post('/ventas', [VentasController::class, 'store'])->name('ventas.store');
//Ruta edit para mostrar formulario de edición
Route::get('/ventas/{venta}/edit', [VentasController::class, 'edit'])->name('ventas.edit');
//Ruta update para actualizar una venta
Route::put('/ventas/{venta}', [VentasController::class, 'update'])->name('ventas.update');
//Ruta destroy para eliminar una venta
Route::delete('/ventas/{venta}', [VentasController::class, 'destroy'])->name('ventas.destroy');

//Ruta index para mostrar inventario
Route::get('/inventario', [inventariosController::class, 'index'])->name('inventarios.index');
//Ruta create para mostrar formulario de creación
Route::get('/inventario/create', [inventariosController::class, 'create'])->name('inventarios.create');
//Ruta show para mostrar un inventario
Route::get('/inventario/{inventario}', [inventariosController::class, 'show'])->name('inventarios.show');
//Ruta store para guardar un inventario
Route::post('/inventario', [inventariosController::class, 'store'])->name('inventarios.store');
//Ruta edit para mostrar formulario de edición
Route::get('/inventario/{inventario}/edit', [inventariosController::class, 'edit'])->name('inventarios.edit');
//Ruta update para actualizar un inventario
Route::put('/inventario/{inventario}', [inventariosController::class, 'update'])->name('inventarios.update');
//Ruta destroy para eliminar un inventario
Route::delete('/inventario/{inventario}', [inventariosController::class, 'destroy'])->name('inventarios.destroy');

//Ruta index para mostrar clientes
Route::get('/clientes', [ClientesController::class, 'index'])->name('clientes.index');
//Ruta create para mostrar formulario de creación
Route::get('/clientes/create', [ClientesController::class, 'create'])->name('clientes.create');
//Ruta show para mostrar un cliente
Route::get('/clientes/{cliente}', [ClientesController::class, 'show'])->name('clientes.show');
//Ruta store para guardar un cliente
Route::post('/clientes', [ClientesController::class, 'store'])->name('clientes.store');
//Ruta edit para mostrar formulario de edición
Route::get('/clientes/{cliente}/edit', [ClientesController::class, 'edit'])->name('clientes.edit');
//Ruta update para actualizar un cliente
Route::put('/clientes/{cliente}', [ClientesController::class, 'update'])->name('clientes.update');
//Ruta destroy para eliminar un cliente
Route::delete('/clientes/{cliente}', [ClientesController::class, 'destroy'])->name('clientes.destroy');




// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';

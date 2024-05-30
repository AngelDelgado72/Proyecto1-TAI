<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // DB::table('categorias')->insert([
        //     'nombre' => 'Categoría 1',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s'),
        // ]);

        DB::table('productos')->insert([
            'nombre' => 'Producto 1',
            'categoria' => '1',
            'precio_venta' => 10.99,
            'precio_compra' => 5.99,
            'fecha_compra' => '2022-01-01',
            'color' => 'Rojo',
            'descripcion_corta' => 'Descripción corta del producto 1',
            'descripcion_larga' => 'Descripción larga del producto 1',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
    ]);

        
        


    }
}



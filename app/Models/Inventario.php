<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;

    protected $fillable = ['producto_id', 'categoria_id', 'fecha_entrada', 'fecha_salida', 'movimiento', 'motivo', 'cantidad'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function getMovimientoAttribute($value)
    {
        return $value == 1 ? 'Entrada' : 'Salida';
    }

    

}

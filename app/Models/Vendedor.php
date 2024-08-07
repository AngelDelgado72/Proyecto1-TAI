<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    use HasFactory;

    protected $table = 'vendedores';

    protected $fillable = ['telefono', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

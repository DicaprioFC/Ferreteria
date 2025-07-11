<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = ['producto_id', 'cantidad', 'costo_unitario'];

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}

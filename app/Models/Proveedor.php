<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // ← Solución aquí 👇
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}

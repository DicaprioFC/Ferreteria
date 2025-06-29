<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['fecha', 'total', 'nombre_cliente', 'ci_cliente'];


    public function detalles()
    {
        return $this->hasMany(DetalleVenta::class, 'venta_id');
    }
    
    public function DetalleVentas()
{
    return $this->hasMany(DetalleVenta::class, 'venta_id');
}

}

<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Entrada;
use App\Models\Salida;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'usuarios' => User::count(),
            'proveedores' => Proveedor::count(),
            'productos' => Producto::count(),
            'ventas' => Venta::count(),
            'entradas' => Entrada::count(),
            'salidas' => Salida::count(),
            'categorias' => Categoria::count(),
            'existencia_total' => Producto::sum('stock'),
            'existencia_vendida' => Salida::sum('cantidad'),
            'existencia_actual' => Producto::sum('stock') - Salida::sum('cantidad'),
        ]);
    }
}

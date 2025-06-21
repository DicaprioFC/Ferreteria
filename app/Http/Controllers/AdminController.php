<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
   

    public function dashboard()
    {
        return view('admin.dashboard', [
            'clientes' => 16,
            'proveedores' => 10,
            'productos' => 185,
            'facturas' => 2,
            'existencia_total' => 308,
            'existencia_vendida' => 69,
            'existencia_actual' => 239,
            'importe_vendido' => 1835,
            'importe_pagado' => 1835,
            'importe_restante' => 0,
            'beneficio_bruto' => 617,
            'beneficio_neto' => 617
        ]);
    }
}

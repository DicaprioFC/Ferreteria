<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class VentaController extends Controller
{
    public function exito($id)
{
    $venta = \App\Models\Venta::with('detalles.producto')->findOrFail($id);
    return view('vendedor.exito', compact('venta'));
}


    public function generarPDF($id)
    {
        $venta = Venta::with('detalles.producto')->findOrFail($id);
        $pdf = PDF::loadView('vendedor.factura', compact('venta'));
        return $pdf->download('factura-venta-' . $venta->id . '.pdf');
    }
}

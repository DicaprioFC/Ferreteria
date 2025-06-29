<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ReporteController extends Controller
{
    public function ventas(Request $request)
    {
        $query = Venta::with('detalleVentas.producto');

        if ($request->filled('desde')) {
            $query->whereDate('fecha', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $query->whereDate('fecha', '<=', $request->hasta);
        }

        $ventas = $query->orderBy('fecha', 'desc')->get();

        return view('admin.reporte.ventas', compact('ventas'));
    }


    public function exportarVentasPDF(Request $request)
    {
        $query = Venta::with('detalleVentas.producto');

        if ($request->filled('desde')) {
            $query->whereDate('fecha', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $query->whereDate('fecha', '<=', $request->hasta);
        }

        $ventas = $query->orderBy('fecha', 'desc')->get();

        $pdf = PDF::loadView('admin.pdfs.ventas', compact('ventas'));
        return $pdf->download('ventas_filtradas.pdf');
    }


    public function inventario(Request $request)
    {
        $query = Producto::with('categoria');

        if ($request->filled('desde')) {
            $query->whereDate('created_at', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $query->whereDate('created_at', '<=', $request->hasta);
        }

        $productos = $query->get();

        return view('admin.reporte.inventario', compact('productos'));
    }

    public function exportarInventarioPDF(Request $request)
    {
        $query = Producto::with('categoria');

        if ($request->filled('desde')) {
            $query->whereDate('created_at', '>=', $request->desde);
        }

        if ($request->filled('hasta')) {
            $query->whereDate('created_at', '<=', $request->hasta);
        }

        $productos = $query->get();

        $pdf = PDF::loadView('admin.pdfs.inventario', compact('productos'));
        return $pdf->download('inventario_filtrado.pdf');
    }



    public function masVendidos()
    {
        $productos = DetalleVenta::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
            ->groupBy('producto_id')
            ->orderByDesc('total_vendido')
            ->with('producto')
            ->get();

        return view('admin.reporte.masvendidos', compact('productos'));
    }

    public function stockBajo()
    {
        $productos = Producto::whereColumn('stock', '<=', 'stock_minimo')->get();
        return view('admin.reporte.stockbajo', compact('productos'));
    }
}

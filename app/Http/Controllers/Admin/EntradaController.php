<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrada;
use App\Models\Producto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with('producto')->latest()->get();
        return view('admin.entradas.index', compact('entradas'));
    }

    public function create()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('admin.entradas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'costo_unitario' => 'nullable|numeric|min:0',
        ]);

        Entrada::create($data);

        // Actualiza el stock del producto
        $producto = Producto::find($data['producto_id']);
        $producto->stock += $data['cantidad'];
        $producto->save();

        return redirect()->route('admin.entradas.index')->with('success', 'Entrada registrada y stock actualizado.');
    }
}

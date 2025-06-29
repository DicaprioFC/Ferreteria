<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Salida;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SalidaController extends Controller
{
    public function index()
    {
        $salidas = Salida::with('producto')->latest()->get();
        return view('admin.salidas.index', compact('salidas'));
    }

    public function create()
    {
        $productos = Producto::orderBy('nombre')->get();
        return view('admin.salidas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
        ]);
    
        $data['user_id'] = Auth::id(); // Esto fuera del validate
    
        $producto = Producto::find($data['producto_id']);
    
        if ($producto->stock < $data['cantidad']) {
            return back()->withErrors(['cantidad' => 'No hay suficiente stock disponible.']);
        }
    
        Salida::create($data);
    
        $producto->stock -= $data['cantidad'];
        $producto->save();
    
        return redirect()->route('admin.salidas.index')->with('success', 'Salida registrada y stock actualizado.');
    }
    
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Mostrar lista de proveedores
    public function index()
    {
        $proveedores = Proveedor::orderBy('nombre')->get();
        return view('admin.provedores.index', compact('proveedores'));
    }

    // Mostrar formulario para crear proveedor
    public function create()
    {
        return view('admin.provedores.crearpro');
    }

    // Guardar nuevo proveedor
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:50',
            'direccion' => 'nullable|string|max:255',
        ]);

        Proveedor::create($validated);

        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedor creado exitosamente.');
    }

    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
    
        return redirect()->route('admin.proveedores.index')
            ->with('success', 'Proveedor eliminado exitosamente.');
    }
    
}

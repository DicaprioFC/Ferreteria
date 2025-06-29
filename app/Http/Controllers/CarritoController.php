<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Salida;
use App\Models\Venta;
use App\Models\DetalleVenta;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    public function agregar(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++;
        } else {
            $carrito[$id] = [
                "nombre" => $producto->nombre,
                "precio" => $producto->precio_venta,
                "imagen" => $producto->imagen_url,
                "cantidad" => 1
            ];
        }

        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    public function verCarrito()
    {
        $carrito = session()->get('carrito', []);
        return view('vendedor.carrito', compact('carrito'));
    }

    public function eliminar($id)
    {
        $carrito = session()->get('carrito', []);
        unset($carrito[$id]);
        session()->put('carrito', $carrito);
        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    public function confirmarVenta(Request $request)
    {
        $carrito = session()->get('carrito', []);
    
        if (empty($carrito)) {
            return redirect()->back()->with('error', 'Carrito vacío.');
        }
    
        $venta = \App\Models\Venta::create([
            'fecha' => now(),
            'total' => collect($carrito)->sum(fn($item) => $item['precio'] * $item['cantidad']),
            'nombre_cliente' => $request->input('nombre_cliente'),
            'ci_cliente' => $request->input('ci_cliente'),
        ]);
    
        foreach ($carrito as $id => $item) {
            \App\Models\DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $id,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
    
            \App\Models\Salida::create([
                'producto_id' => $id,
                'cantidad' => $item['cantidad'],
                'precio_unitario' => $item['precio'],
            ]);
    
            $producto = \App\Models\Producto::find($id);
            if ($producto) {
                $producto->stock -= $item['cantidad'];
                $producto->save();
            }
        }
    
        session()->forget('carrito');
    
        return redirect()->route('ventas.exito', ['id' => $venta->id])->with('success', 'Venta realizada con éxito.');

    }
    
}

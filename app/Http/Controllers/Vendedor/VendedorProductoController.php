<?php

namespace App\Http\Controllers\Vendedor;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class VendedorProductoController extends Controller
{
    public function index()
    {
        $categorias = Categoria::with('productos')->get();
        return view('dashboard', compact('categorias'));
    }

    public function buscar(Request $request)
    {
        $busqueda = $request->input('busqueda');
        $categoriaId = $request->input('categoria');

        // Traer todas las categorías para el select del buscador
        $todasCategorias = Categoria::all();

        // Consulta con filtros dinámicos
        $categorias = Categoria::with(['productos' => function ($query) use ($busqueda) {
            if ($busqueda) {
                $query->where('nombre', 'like', "%$busqueda%")
                    ->orWhere('codigo', 'like', "%$busqueda%");
            }
        }])
            ->when($categoriaId, function ($query) use ($categoriaId) {
                $query->where('id', $categoriaId);
            })
            ->get();

        $carrito = session('carrito', []);
        $cantidadCarrito = array_sum(array_column($carrito, 'cantidad'));


        return view('vendedor.filtro', compact('categorias','cantidadCarrito'));
    }
}

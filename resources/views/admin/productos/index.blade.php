<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        .product-image {
            width: 40px;
            /* Ancho fijo */
            height: 40px;
            /* Alto fijo */
            object-fit: cover;
            /* Mantiene proporción y recorta si es necesario */
            border-radius: 0.375rem;
            /* Bordes redondeados (6px) */
            border: 1px solid #d1d5db;
            /* Borde gris claro (gray-300) */
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            /* Sombra suave */
            display: block;
            margin-left: auto;
            margin-right: auto;
            /* Centrado horizontal */
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-blue-800 mb-6">📦 Lista de Productos</h1>

        @if(session('success'))
        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded mb-4 shadow">
            {{ session('success') }}
        </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline text-sm">← Volver al panel de control</a>
            <a href="{{ route('admin.productos.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded shadow">
                + Agregar Producto
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
                <thead class="bg-gray-200 text-gray-700 uppercase text-sm font-semibold">
                    <tr>
                        <th class="px-6 py-3 text-left">Código</th>
                        <th class="px-6 py-3 text-left">Nombre</th>
                        <th class="px-6 py-3 text-left">Categoría</th>
                        <th class="px-6 py-3 text-left">Proveedor</th>
                        <th class="px-6 py-3 text-right">Precio</th>
                        <th class="px-6 py-3 text-right">Stock</th>
                        <th class="px-6 py-3 text-center">Imagen</th>
                        <th class="px-6 py-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($productos as $producto)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4">{{ $producto->codigo }}</td>
                        <td class="px-6 py-4">{{ $producto->nombre }}</td>
                        <td class="px-6 py-4">{{ $producto->categoria->nombre ?? '-' }}</td>
                        <td class="px-6 py-4">{{ $producto->proveedor->nombre ?? '-' }}</td>
                        <td class="px-6 py-4 text-right">${{ number_format($producto->precio_venta, 2) }}</td>
                        <td class="px-6 py-4 text-right">{{ $producto->stock }}</td>
                        <td class="px-6 py-4 text-center">
                            @if ($producto->imagen_url)
                            <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="product-image">


                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-center space-x-2">
                            <a href="{{ route('admin.productos.edit', $producto) }}"
                                class="text-blue-600 hover:text-blue-800 font-medium">Editar</a>
                            <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este producto?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 font-medium">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-6 py-6 text-center text-gray-500">No hay productos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
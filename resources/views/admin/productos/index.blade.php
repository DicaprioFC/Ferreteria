<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Gestión de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f3f4f6;
            color: #1f2937;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .container {
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
            padding-left: 1.5rem;
            padding-right: 1.5rem;
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
        }

        h1 {
            font-size: 2.25rem;
            font-weight: 700;
            color: #1e40af;
            text-align: center;
            margin-bottom: 2rem;
        }

        .success-message {
            background-color: #dcfce7;
            border-left: 4px solid #22c55e;
            color: #15803d;
            padding: 1rem 1.25rem;
            border-radius: 0.375rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(34, 197, 94, 0.1);
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
        }

        .top-bar a {
            font-weight: 600;
            color: #2563eb;
            text-decoration: none;
        }

        .top-bar a:hover {
            color: #1e40af;
        }

        .btn-add {
            background-color: #1e3a8a; /* azul oscuro */
            color: white; /* texto blanco legible */
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            font-weight: 700;
            box-shadow: 0 2px 6px rgba(30, 58, 138, 0.6);
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-add:hover {
            background-color: #2563eb; /* azul más claro al pasar el mouse */
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 0.5rem;
            border: 1px solid #d1d5db;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        thead {
            background-color: #e0e7ff;
            color: #3730a3;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.875rem;
        }

        th,
        td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        th.text-right,
        td.text-right {
            text-align: right;
        }

        th.text-center,
        td.text-center {
            text-align: center;
        }

        tbody tr:hover {
            background-color: #f3f4f6;
        }

        .product-image {
            width: 40px;
            height: 40px;
            object-fit: cover;
            border-radius: 0.375rem;
            border: 1px solid #d1d5db;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .actions a,
        .actions button {
            font-weight: 600;
            cursor: pointer;
            border: none;
            background: none;
            padding: 0;
            margin-left: 0.5rem;
            margin-right: 0.5rem;
            color: #2563eb;
            transition: color 0.3s ease;
            text-decoration: none;
        }

        .actions a:hover,
        .actions button:hover {
            color: #1e40af;
        }

        .actions button.text-red {
            color: #dc2626;
        }

        .actions button.text-red:hover {
            color: #991b1b;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>📦 Gestión de Productos</h1>

        @if(session('success'))
        <div class="success-message" role="alert">
            {{ session('success') }}
        </div>
        @endif

        <div class="top-bar">
            <a href="{{ route('admin.dashboard') }}">← Volver al panel de control</a>
            <a href="{{ route('admin.productos.create') }}" class="btn-add">+ Agregar Producto</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th class="text-left">Código</th>
                        <th class="text-left">Nombre</th>
                        <th class="text-left">Categoría</th>
                        <th class="text-left">Proveedor</th>
                        <th class="text-right">Precio</th>
                        <th class="text-right">Stock</th>
                        <th class="text-center">Imagen</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                    <tr>
                        <td class="text-left">{{ $producto->codigo }}</td>
                        <td class="text-left">{{ $producto->nombre }}</td>
                        <td class="text-left">{{ $producto->categoria->nombre ?? '-' }}</td>
                        <td class="text-left">{{ $producto->proveedor->nombre ?? '-' }}</td>
                        <td class="text-right">${{ number_format($producto->precio_venta, 2) }}</td>
                        <td class="text-right">{{ $producto->stock }}</td>
                        <td class="text-center">
                            @if ($producto->imagen_url)
                            <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" class="product-image" />
                            @else
                            <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="text-center actions">
                            <a href="{{ route('admin.productos.edit', $producto) }}">Editar</a>
                            <form action="{{ route('admin.productos.destroy', $producto) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este producto?');" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center text-gray-500">No hay productos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

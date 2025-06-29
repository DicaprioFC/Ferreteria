<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos con Stock Bajo</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        th {
            background: #eee;
        }

        .stock-bajo {
            background-color: #fdd;
        }
    </style>
</head>

<body>
    <h1>Reporte de Productos con Stock Bajo</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline text-sm">← Volver al panel de control</a>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Stock Actual</th>
                <th>Stock Mínimo</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
            <tr class="{{ $producto->stock <= $producto->stock_minimo ? 'stock-bajo' : '' }}">
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ $producto->stock_minimo }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3" style="text-align:center;">No hay productos con stock bajo.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
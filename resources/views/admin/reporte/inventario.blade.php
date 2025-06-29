<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Inventario Actual</title>
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
    </style>
</head>

<body>
    <h1>Reporte de Inventario Actual</h1>

    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline text-sm">← Volver al panel de control</a>

    <div style="margin: 15px 0;">
        <a href="{{ route('reportes.inventario.pdf', request()->query()) }}"
            style="background-color: crimson; color: white; padding: 8px 12px; text-decoration: none; border-radius: 5px;">
            📄 Exportar a PDF
        </a>

        <form method="GET" action="{{ route('reportes.inventario') }}" style="margin: 15px 0;">
            <label>Desde: <input type="date" name="desde" value="{{ request('desde') }}"></label>
            <label>Hasta: <input type="date" name="hasta" value="{{ request('hasta') }}"></label>
            <button type="submit" style="padding: 5px 10px; background: #2563eb; color: white; border: none; border-radius: 5px;">🔍 Filtrar</button>
        </form>

    </div>


    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Categoría</th>
                <th>Stock</th>
                <th>Precio Venta (Bs)</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $producto)
            <tr>
                <td>{{ $producto->nombre }}</td>
                <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                <td>{{ $producto->stock }}</td>
                <td>{{ number_format($producto->precio_venta, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center;">No hay productos registrados.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
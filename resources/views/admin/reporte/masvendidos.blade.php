<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Productos Más Vendidos</title>
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
    <h1>Reporte de Productos Más Vendidos</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline text-sm">← Volver al panel de control</a>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
            </tr>
        </thead>
        <tbody>
            @forelse($productos as $item)
            <tr>
                <td>{{ $item->producto->nombre ?? 'Producto no encontrado' }}</td>
                <td>{{ $item->total_vendido }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="2" style="text-align:center;">No hay ventas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
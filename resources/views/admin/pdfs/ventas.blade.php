<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas por Período</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px;
            text-align: left;
            vertical-align: top;
        }

        th {
            background: #eee;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <h1>Reporte de Ventas por Período</h1>

    <table>
        <thead>
            <tr>
                <th>ID Venta</th>
                <th>Fecha</th>
                <th>Total (Bs)</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @forelse($ventas as $venta)
            <tr>
                <td>{{ $venta->id }}</td>
                <td>{{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y H:i') }}</td>
                <td>{{ number_format($venta->total, 2) }}</td>
                <td>
                    <ul>
                        @foreach($venta->detalleVentas as $detalle)
                        <li>{{ $detalle->producto->nombre ?? 'Producto eliminado' }} x {{ $detalle->cantidad }} (Bs {{ number_format($detalle->precio_unitario, 2) }})</li>
                        @endforeach
                    </ul>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align:center;">No hay ventas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>
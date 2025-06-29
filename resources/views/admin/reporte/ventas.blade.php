<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte de Ventas por Período</title>
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

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>
    <h1>Reporte de Ventas por Período</h1>
    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline text-sm">← Volver al panel de control</a>


    <div style="margin: 15px 0;">
        <a href="{{ route('reportes.ventas.pdf', request()->query()) }}"
            style="background-color: crimson; color: white; padding: 8px 12px; text-decoration: none; border-radius: 5px;">
            📄 Exportar a PDF
        </a>
        <form method="GET" action="{{ route('reportes.ventas') }}" style="margin: 15px 0;">
            <label>Desde: <input type="date" name="desde" value="{{ request('desde') }}"></label>
            <label>Hasta: <input type="date" name="hasta" value="{{ request('hasta') }}"></label>
            <button type="submit" style="padding: 5px 10px; background: #2563eb; color: white; border: none; border-radius: 5px;">🔍 Filtrar</button>
        </form>
    </div>


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
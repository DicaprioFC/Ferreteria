<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Reporte de Ventas por Período</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #111827;
        }

        a.back-link {
            display: inline-block;
            margin-bottom: 20px;
            color: #2563eb;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 600;
        }

        a.back-link:hover {
            text-decoration: underline;
        }

        .actions {
            max-width: 700px;
            margin: 0 auto 30px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .actions a.export-pdf {
            background-color: crimson;
            color: white;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            white-space: nowrap;
            transition: background-color 0.3s ease;
        }

        .actions a.export-pdf:hover {
            background-color: #a00000;
        }

        form.filter-form {
            display: flex;
            gap: 10px;
            align-items: center;
            flex-wrap: wrap;
        }

        form.filter-form label {
            font-size: 0.9rem;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            color: #374151;
        }

        form.filter-form input[type="date"] {
            margin-top: 4px;
            padding: 6px 8px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            font-size: 1rem;
        }

        form.filter-form button {
            padding: 8px 16px;
            background-color: #2563eb;
            border: none;
            border-radius: 5px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form.filter-form button:hover {
            background-color: #1e40af;
        }

        table {
            width: 90%;
            max-width: 900px;
            margin: 0 auto;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #f3f4f6;
        }

        th,
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
            font-size: 1rem;
            vertical-align: top;
        }

        th {
            color: #374151;
            font-weight: 700;
        }

        tbody tr:hover {
            background-color: #f9fafb;
        }

        tbody td ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
        }

        tbody td[colspan="4"] {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-style: italic;
        }

        @media (max-width: 600px) {
            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <h1>Reporte de Ventas por Período</h1>

    <a href="{{ route('admin.dashboard') }}" class="back-link">← Volver al panel de control</a>

    <div class="actions">
        <a href="{{ route('reportes.ventas.pdf', request()->query()) }}" class="export-pdf">
            📄 Exportar a PDF
        </a>

        <form method="GET" action="{{ route('reportes.ventas') }}" class="filter-form">
            <label>
                Desde:
                <input type="date" name="desde" value="{{ request('desde') }}" />
            </label>
            <label>
                Hasta:
                <input type="date" name="hasta" value="{{ request('hasta') }}" />
            </label>
            <button type="submit">🔍 Filtrar</button>
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
                <td colspan="4">No hay ventas registradas.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>

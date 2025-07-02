<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Reporte de Productos Más Vendidos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9fafb;
            color: #1f2937;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        h1 {
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

        table {
            margin: 0 auto;
            width: 90%;
            max-width: 700px;
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
        }

        th {
            color: #374151;
            font-weight: 700;
        }

        tbody tr:hover {
            background-color: #f9fafb;
        }

        tbody td[colspan="2"] {
            text-align: center;
            padding: 20px;
            color: #6b7280;
            font-style: italic;
        }
    </style>
</head>

<body>
    <h1>Reporte de Productos Más Vendidos</h1>

    <a href="{{ route('admin.dashboard') }}" class="back-link">← Volver al panel de control</a>

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
                    <td colspan="2">No hay ventas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>

</html>

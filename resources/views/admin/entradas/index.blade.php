<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Entradas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            color: #1f2937;
        }

        .main-container {
            max-width: 960px;
            margin: 0 auto;
            padding: 1.5rem;
        }

        .title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1e40af;
            text-align: center;
        }

        .success-box {
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .table-container {
            margin-top: 2rem;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-link {
            color: #2563eb;
            text-decoration: underline;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 0.5rem;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid #d1d5db;
        }

        th,
        td {
            padding: 0.75rem 1rem;
        }

        thead {
            background-color: #f9fafb;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.875rem;
            border-bottom: 1px solid #d1d5db;
        }

        tbody tr {
            border-bottom: 1px solid #e5e7eb;
        }

        tbody tr:hover {
            background-color: #f3f4f6;
        }

        .table-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .no-entries {
            text-align: center;
            padding: 1.5rem;
            color: #6b7280;
        }
    </style>
</head>

<body>

    <div class="main-container">
        <h1 class="title">Entradas de Inventario</h1>

        @if(session('success'))
        <div class="success-box">
            {{ session('success') }}
        </div>
        @endif

        <div class="table-actions">
            <a href="{{ route('admin.dashboard') }}" class="btn-link">← Volver al Dashboard</a>
            <a href="{{ route('admin.entradas.create') }}" class="btn-primary">+ Registrar Nueva Entrada</a>
        </div>

        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th class="text-right">Cantidad</th>
                        <th class="text-right">Costo Unitario</th>
                        <th class="text-center">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($entradas as $entrada)
                    <tr>
                        <td>{{ $entrada->producto->nombre ?? 'Producto eliminado' }}</td>
                        <td class="text-right">{{ $entrada->cantidad }}</td>
                        <td class="text-right">
                            {{ $entrada->costo_unitario ? '$' . number_format($entrada->costo_unitario, 2) : '-' }}
                        </td>
                        <td class="text-center">{{ $entrada->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="no-entries">No hay entradas registradas.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

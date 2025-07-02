<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Proveedores</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', sans-serif;
        }

        .container-box {
            max-width: 1000px;
            margin: 2rem auto;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .success-message {
            background-color: #d1fae5;
            color: #065f46;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            text-align: center;
            font-weight: 500;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-back {
            color: #4b5563;
            text-decoration: underline;
            font-weight: 500;
        }

        .btn-danger {
            color: #dc2626;
            font-weight: 600;
        }

        .btn-danger:hover {
            text-decoration: underline;
        }

        .data-table {
            width: 100%;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            overflow: hidden;
        }

        .data-table th {
            background-color: #e5e7eb;
            text-transform: uppercase;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            text-align: left;
            padding: 0.75rem 1rem;
        }

        .data-table td {
            padding: 0.75rem 1rem;
            border-top: 1px solid #e5e7eb;
        }

        .data-table tr:hover {
            background-color: #f9fafb;
        }

        .text-center {
            text-align: center;
        }

        .no-data {
            color: #6b7280;
            padding: 2rem 0;
            font-style: italic;
        }
    </style>
</head>

<body>

    <div class="container-box">
        <h1 class="page-title">📋 Lista de Proveedores</h1>

        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif

        <div class="actions">
            <a href="{{ route('admin.dashboard') }}" class="btn-back">← Volver al panel de control</a>
            <a href="{{ route('admin.proveedores.create') }}" class="btn-primary">
                + Agregar Proveedor
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($proveedores as $proveedor)
                    <tr>
                        <td>{{ $proveedor->nombre }}</td>
                        <td>{{ $proveedor->email ?? '-' }}</td>
                        <td>{{ $proveedor->telefono ?? '-' }}</td>
                        <td>{{ $proveedor->direccion ?? '-' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.proveedores.destroy', $proveedor) }}" method="POST" class="inline"
                                onsubmit="return confirm('¿Eliminar este proveedor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center no-data">No hay proveedores registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>

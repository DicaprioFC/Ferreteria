<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Listado de Salidas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f3f4f6; /* Tailwind bg-gray-100 */
            color: #1f2937; /* Tailwind text-gray-800 */
            padding: 1.5rem; /* Tailwind p-6 */
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 960px;
            margin-left: auto;
            margin-right: auto;
        }

        h1 {
            font-weight: 700;
            font-size: 1.5rem; /* text-2xl */
            margin-bottom: 1.5rem; /* mb-6 */
            color: #1e40af; /* Tailwind blue-800 */
        }

        a {
            color: #2563eb; /* Tailwind blue-600 */
            text-decoration: none;
            transition: color 0.3s ease;
        }

        a:hover {
            text-decoration: underline;
            color: #1e40af; /* Tailwind blue-700 */
        }

        .button-primary {
            background-color: #2563eb; /* Tailwind blue-600 */
            color: white;
            padding: 0.5rem 1rem; /* px-4 py-2 */
            border-radius: 0.375rem; /* rounded */
            display: inline-block;
            margin-bottom: 1rem; /* mb-4 */
            transition: background-color 0.3s ease;
        }

        .button-primary:hover {
            background-color: #1e40af; /* Tailwind blue-700 */
        }

        table {
            width: 100%;
            background-color: white;
            border: 1px solid #d1d5db; /* Tailwind border-gray-300 */
            border-radius: 0.5rem; /* rounded */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1); /* shadow */
            border-collapse: separate;
            border-spacing: 0;
        }

        thead {
            background-color: #f3f4f6; /* Tailwind bg-gray-100 */
            border-bottom: 1px solid #d1d5db; /* border-b border-gray-300 */
        }

        thead th {
            padding: 0.5rem 1rem; /* py-2 px-4 */
            font-size: 0.875rem; /* text-sm */
            font-weight: 600; /* font-semibold */
            text-transform: uppercase;
            color: #374151; /* Tailwind text-gray-700 */
            text-align: left;
        }

        thead th.text-right {
            text-align: right;
        }

        thead th.text-center {
            text-align: center;
        }

        tbody tr {
            border-bottom: 1px solid #d1d5db;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f9fafb; /* Tailwind hover:bg-gray-50 */
        }

        tbody td {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            vertical-align: middle;
        }

        tbody td.text-right {
            text-align: right;
        }

        tbody td.text-center {
            text-align: center;
        }

        .text-center {
            text-align: center;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .message-success {
            background-color: #dcfce7; /* bg-green-100 */
            color: #166534; /* text-green-800 */
            padding: 0.75rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
            box-shadow: 0 1px 3px rgba(22, 101, 52, 0.3);
        }

        /* Responsive */
        @media (max-width: 640px) {
            thead {
                display: none;
            }
            tbody td {
                display: block;
                width: 100%;
                box-sizing: border-box;
            }
            tbody td::before {
                content: attr(data-label);
                font-weight: 600;
                display: inline-block;
                width: 120px;
            }
            tbody tr {
                margin-bottom: 1rem;
                display: block;
                border-bottom: 2px solid #e5e7eb;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Salidas de Inventario</h1>

        <a href="{{ route('admin.dashboard') }}" class="button-primary" style="margin-bottom:1rem; display: inline-block;">← Volver al Dashboard</a>

        @if(session('success'))
        <div class="message-success">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('admin.salidas.create') }}" class="button-primary">+ Registrar Nueva Salida</a>

        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th class="text-right">Cantidad</th>
                    <th class="text-right">Precio Unitario</th>
                    <th class="text-center">Fecha</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($salidas as $salida)
                <tr>
                    <td data-label="Producto">{{ $salida->producto->nombre ?? 'Producto eliminado' }}</td>
                    <td class="text-right" data-label="Cantidad">{{ $salida->cantidad }}</td>
                    <td class="text-right" data-label="Precio Unitario">${{ number_format($salida->precio_unitario, 2) }}</td>
                    <td class="text-center" data-label="Fecha">{{ $salida->created_at->format('d/m/Y H:i') }}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-gray-500" style="padding: 2rem 0;">No hay salidas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>

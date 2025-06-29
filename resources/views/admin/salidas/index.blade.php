<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Salidas</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6 text-gray-800">

<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-6">Salidas de Inventario</h1>


    <div class="mt-6 flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Volver al Dashboard</a>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.salidas.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
        + Registrar Nueva Salida
    </a>

    <table class="min-w-full bg-white border border-gray-300 rounded shadow">
        <thead class="bg-gray-100 border-b border-gray-300">
            <tr>
                <th class="py-2 px-4 text-left">Producto</th>
                <th class="py-2 px-4 text-right">Cantidad</th>
                <th class="py-2 px-4 text-right">Precio Unitario</th>
                <th class="py-2 px-4 text-center">Fecha</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($salidas as $salida)
                <tr class="border-b border-gray-300 hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $salida->producto->nombre ?? 'Producto eliminado' }}</td>
                    <td class="py-2 px-4 text-right">{{ $salida->cantidad }}</td>
                    <td class="py-2 px-4 text-right">${{ number_format($salida->precio_unitario, 2) }}</td>
                    <td class="py-2 px-4 text-center">{{ $salida->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-500">No hay salidas registradas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Venta Exitosa</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-green-50 text-gray-900">

    <div class="max-w-4xl mx-auto p-6 mt-10 bg-white shadow rounded">
        <h1 class="text-2xl font-bold text-green-700 mb-4">✅ Venta realizada con éxito</h1>

        <p class="mb-2"><strong>Cliente:</strong> {{ $venta->nombre_cliente ?? 'Sin nombre' }}</p>
        <p class="mb-2"><strong>CI/NIT:</strong> {{ $venta->ci_cliente ?? 'Sin CI' }}</p>
        <p class="mb-2"><strong>Fecha:</strong> {{ $venta->fecha }}</p>
        <p class="mb-4"><strong>Total:</strong> <span class="text-lg font-bold text-green-600">Bs. {{ number_format($venta->total, 2) }}</span></p>

        <h2 class="text-lg font-semibold mb-2">🧾 Detalles de la venta:</h2>
        <table class="w-full table-auto border">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-2 py-1 border">Producto</th>
                    <th class="px-2 py-1 border">Cantidad</th>
                    <th class="px-2 py-1 border">Precio Unitario (Bs)</th>
                    <th class="px-2 py-1 border">Subtotal (Bs)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($venta->detalles as $detalle)
                <tr class="text-center">
                    <td class="border px-2 py-1">{{ $detalle->producto->nombre }}</td>
                    <td class="border px-2 py-1">{{ $detalle->cantidad }}</td>
                    <td class="border px-2 py-1">{{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td class="border px-2 py-1">{{ number_format($detalle->precio_unitario * $detalle->cantidad, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">← Volver al Dashboard</a>

            <a href="{{ route('ventas.pdf', $venta->id) }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Descargar PDF
            </a>
        </div>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6 text-gray-800">

    <div class="mt-6 flex justify-between items-center">
        <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Volver al Dashboard</a>


        <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
            <h2 class="text-xl font-bold mb-4">Registrar Entrada</h2>




            @if ($errors->any())
            <div class="bg-red-100 p-2 text-red-800 rounded mb-3">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.entradas.store') }}">
                @csrf

                <label class="block mb-2">Producto:</label>
                <select name="producto_id" required class="w-full border px-3 py-2 rounded mb-4">
                    @foreach ($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>

                <label class="block mb-2">Cantidad:</label>
                <input type="number" name="cantidad" required class="w-full border px-3 py-2 rounded mb-4">

                <label class="block mb-2">Costo Unitario (opcional):</label>
                <input type="number" step="0.01" name="costo_unitario" class="w-full border px-3 py-2 rounded mb-4">

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Registrar</button>
                </div>
            </form>
        </div>
</body>

</html>
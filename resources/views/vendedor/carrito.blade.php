<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <link rel="stylesheet" href="/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>

<body>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Carrito de Compras</h1>

        <div class="mt-6 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-blue-600 hover:underline">← Volver al Dashboard</a>

        @if(session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
        @endif

        @if(empty($carrito))
        <p class="text-gray-600">El carrito está vacío.</p>
        @else
        <table class="w-full mb-6">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $item)
                <tr>
                    <td>{{ $item['nombre'] }}</td>
                    <td><img src="{{ $item['imagen'] }}" class="h-12" /></td>
                    <td>${{ number_format($item['precio'], 2) }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-500">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <form action="{{ route('carrito.confirmar') }}" method="POST" class="bg-white p-4 rounded shadow mt-6">
            @csrf

            <h2 class="text-lg font-semibold mb-4">Datos del Cliente</h2>

            <div class="mb-4">
                <label for="nombre_cliente" class="block text-gray-700">Nombre del Cliente</label>
                <input type="text" name="nombre_cliente" id="nombre_cliente" class="w-full border rounded px-3 py-2" placeholder="Opcional">
            </div>

            <div class="mb-4">
                <label for="ci_cliente" class="block text-gray-700">CI/NIT del Cliente</label>
                <input type="text" name="ci_cliente" id="ci_cliente" class="w-full border rounded px-3 py-2" placeholder="Opcional">
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Confirmar Venta
            </button>
        </form>
        @endif
    </div>
</body>

</html>
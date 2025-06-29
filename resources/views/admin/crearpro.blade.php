<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agregar Proveedor</title>

</head>
<body class="bg-gray-100 text-gray-800">

<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-2xl font-bold mb-6">Agregar Nuevo Proveedor</h1>

    
    <a href="{{ route('admin.proveedores.index') }}" class="text-gray-600 hover:underline">← lista de proveedores</a>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.proveedores.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label for="nombre" class="block mb-1 font-semibold">Nombre <span class="text-red-600">*</span></label>
            <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mb-4">
            <label for="email" class="block mb-1 font-semibold">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mb-4">
            <label for="telefono" class="block mb-1 font-semibold">Teléfono</label>
            <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="mb-4">
            <label for="direccion" class="block mb-1 font-semibold">Dirección</label>
            <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div class="flex justify-end">
            <a href="{{ route('admin.dashboard') }}" class="mr-4 text-gray-600 hover:underline">Cancelar</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
        </div>
    </form>
</div>

</body>
</html>

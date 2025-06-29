<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Lista de Proveedores</title>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Lista de Proveedores</h1>

        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:underline">← Volver a al panel de control</a>

        <a href="{{ route('admin.proveedores.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-4 inline-block">
            + Agregar Proveedor
        </a>

        <table class="min-w-full bg-white border border-gray-300 rounded shadow">
            <thead class="bg-gray-100 border-b border-gray-300">
                <tr>
                    <th class="py-2 px-4 text-left">Nombre</th>
                    <th class="py-2 px-4 text-left">Email</th>
                    <th class="py-2 px-4 text-left">Teléfono</th>
                    <th class="py-2 px-4 text-left">Dirección</th>
                    <th class="py-2 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($proveedores as $proveedor)
                <tr class="border-b border-gray-300 hover:bg-gray-50">
                    <td class="py-2 px-4">{{ $proveedor->nombre }}</td>
                    <td class="py-2 px-4">{{ $proveedor->email ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $proveedor->telefono ?? '-' }}</td>
                    <td class="py-2 px-4">{{ $proveedor->direccion ?? '-' }}</td>
                    <td class="py-2 px-4 text-center space-x-2">
                        <form action="{{ route('admin.proveedores.destroy', $proveedor) }}" method="POST" class="inline" onsubmit="return confirm('¿Eliminar este proveedor?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-4 text-gray-500">No hay proveedores registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-6">

    <h1 class="text-2xl font-bold mb-6">Editar Producto</h1>

    @if ($errors->any())
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.productos.update', $producto) }}" method="POST" class="bg-white p-6 rounded shadow max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="codigo" class="block font-semibold mb-1">Código:</label>
            <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $producto->codigo) }}" class="w-full border rounded px-3 py-2" required />
        </div>

        <div class="mb-4">
            <label for="nombre" class="block font-semibold mb-1">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}" class="w-full border rounded px-3 py-2" required />
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block font-semibold mb-1">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3" class="w-full border rounded px-3 py-2">{{ old('descripcion', $producto->descripcion) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="categoria_id" class="block font-semibold mb-1">Categoría:</label>
            <select name="categoria_id" id="categoria_id" class="w-full border rounded px-3 py-2" required>
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ (old('categoria_id', $producto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="proveedor_id" class="block font-semibold mb-1">Proveedor:</label>
            <select name="proveedor_id" id="proveedor_id" class="w-full border rounded px-3 py-2">
                <option value="">-- Opcional --</option>
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ (old('proveedor_id', $producto->proveedor_id) == $proveedor->id) ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label for="precio_compra" class="block font-semibold mb-1">Precio Compra:</label>
                <input type="number" step="0.01" min="0" name="precio_compra" id="precio_compra" value="{{ old('precio_compra', $producto->precio_compra) }}" class="w-full border rounded px-3 py-2" required />
            </div>
            <div>
                <label for="precio_venta" class="block font-semibold mb-1">Precio Venta:</label>
                <input type="number" step="0.01" min="0" name="precio_venta" id="precio_venta" value="{{ old('precio_venta', $producto->precio_venta) }}" class="w-full border rounded px-3 py-2" required />
            </div>
        </div>

        <div class="mb-4 grid grid-cols-2 gap-4">
            <div>
                <label for="stock" class="block font-semibold mb-1">Stock Inicial:</label>
                <input type="number" min="0" name="stock" id="stock" value="{{ old('stock', $producto->stock) }}" class="w-full border rounded px-3 py-2" required />
            </div>
            <div>
                <label for="stock_minimo" class="block font-semibold mb-1">Stock Mínimo:</label>
                <input type="number" min="0" name="stock_minimo" id="stock_minimo" value="{{ old('stock_minimo', $producto->stock_minimo) }}" class="w-full border rounded px-3 py-2" />
            </div>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('admin.productos.index') }}" class="text-gray-600 hover:underline">← Volver a la lista</a>
            <button type="submit" class="bg-blue-600 text-white px-5 py-2 rounded hover:bg-blue-700">Actualizar Producto</button>
        </div>
    </form>

</body>

</html>
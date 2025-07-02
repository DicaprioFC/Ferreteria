<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            color: #1f2937;
        }

        .form-container {
            max-width: 640px;
            margin: auto;
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #1e40af;
        }

        .form-label {
            font-weight: 600;
            margin-bottom: 0.25rem;
            display: block;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            outline: none;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.3);
        }

        .form-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #fff;
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-link {
            color: #4b5563;
            text-decoration: underline;
        }

        .error-box {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>

<body class="p-6">

    <div class="form-container">
        <h1 class="form-title">Editar Producto</h1>

        @if ($errors->any())
        <div class="error-box">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.productos.update', $producto) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="codigo" class="form-label">Código:</label>
                <input type="text" name="codigo" id="codigo" value="{{ old('codigo', $producto->codigo) }}"
                    class="form-input" required />
            </div>

            <div class="mb-4">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" name="nombre" id="nombre" value="{{ old('nombre', $producto->nombre) }}"
                    class="form-input" required />
            </div>

            <div class="mb-4">
                <label for="descripcion" class="form-label">Descripción:</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                    class="form-textarea">{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="categoria_id" class="form-label">Categoría:</label>
                <select name="categoria_id" id="categoria_id" class="form-select" required>
                    <option value="">-- Seleccione --</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}"
                        {{ (old('categoria_id', $producto->categoria_id) == $categoria->id) ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="proveedor_id" class="form-label">Proveedor:</label>
                <select name="proveedor_id" id="proveedor_id" class="form-select">
                    <option value="">-- Opcional --</option>
                    @foreach ($proveedores as $proveedor)
                    <option value="{{ $proveedor->id }}"
                        {{ (old('proveedor_id', $producto->proveedor_id) == $proveedor->id) ? 'selected' : '' }}>
                        {{ $proveedor->nombre }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="precio_compra" class="form-label">Precio Compra:</label>
                    <input type="number" step="0.01" min="0" name="precio_compra" id="precio_compra"
                        value="{{ old('precio_compra', $producto->precio_compra) }}" class="form-input" required />
                </div>
                <div>
                    <label for="precio_venta" class="form-label">Precio Venta:</label>
                    <input type="number" step="0.01" min="0" name="precio_venta" id="precio_venta"
                        value="{{ old('precio_venta', $producto->precio_venta) }}" class="form-input" required />
                </div>
            </div>

            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <label for="stock" class="form-label">Stock Inicial:</label>
                    <input type="number" min="0" name="stock" id="stock"
                        value="{{ old('stock', $producto->stock) }}" class="form-input" required />
                </div>
                <div>
                    <label for="stock_minimo" class="form-label">Stock Mínimo:</label>
                    <input type="number" min="0" name="stock_minimo" id="stock_minimo"
                        value="{{ old('stock_minimo', $producto->stock_minimo) }}" class="form-input" />
                </div>
            </div>

            <div class="form-actions">
                <a href="{{ route('admin.productos.index') }}" class="btn-link">← Volver a la lista</a>
                <button type="submit" class="btn-primary">Actualizar Producto</button>
            </div>
        </form>
    </div>

</body>

</html>

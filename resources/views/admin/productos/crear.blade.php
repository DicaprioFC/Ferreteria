<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agregar Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #1f2937;
            padding: 1.5rem;
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #1e40af;
            text-align: center;
        }

        .form-container {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 0.5rem;
            color: #374151;
        }

        input[type="text"],
        input[type="number"],
        input[type="url"],
        select,
        textarea {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
            color: #111827;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="url"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.4);
        }

        textarea {
            resize: vertical;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .grid-cols-2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
        }

        .error-messages {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 6px rgba(185, 28, 28, 0.2);
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .error-messages ul {
            margin: 0;
            padding-left: 1.25rem;
        }

        .error-messages li {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 1.5rem;
        }

        .btn-back {
            color: #6b7280;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .btn-back:hover {
            color: #2563eb;
        }

        .btn-submit {
            background-color: #2563eb;
            color: white;
            padding: 0.5rem 1.5rem;
            font-weight: 700;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1e40af;
        }
    </style>
</head>

<body>

    <h1>Agregar Nuevo Producto</h1>

    @if ($errors->any())
    <div class="error-messages" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.productos.store') }}" method="POST" class="form-container">
        @csrf

        <div class="mb-4">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" id="codigo" value="{{ old('codigo') }}" required />
        </div>

        <div class="mb-4">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') }}" required />
        </div>

        <div class="mb-4">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" rows="3">{{ old('descripcion') }}</textarea>
        </div>

        <div class="mb-4">
            <label for="categoria_id">Categoría:</label>
            <select name="categoria_id" id="categoria_id" required>
                <option value="">-- Seleccione --</option>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->id }}" {{ old('categoria_id') == $categoria->id ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label for="proveedor_id">Proveedor:</label>
            <select name="proveedor_id" id="proveedor_id">
                <option value="">-- Opcional --</option>
                @foreach ($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                    {{ $proveedor->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4 grid-cols-2" style="display:grid; grid-template-columns: repeat(2, 1fr); gap:1rem;">
            <div>
                <label for="precio_compra">Precio Compra:</label>
                <input type="number" step="0.01" min="0" name="precio_compra" id="precio_compra" value="{{ old('precio_compra') }}" required />
            </div>
            <div>
                <label for="precio_venta">Precio Venta:</label>
                <input type="number" step="0.01" min="0" name="precio_venta" id="precio_venta" value="{{ old('precio_venta') }}" required />
            </div>
        </div>

        <div class="mb-4 grid-cols-2" style="display:grid; grid-template-columns: repeat(2, 1fr); gap:1rem;">
            <div>
                <label for="stock">Stock Inicial:</label>
                <input type="number" min="0" name="stock" id="stock" value="{{ old('stock', 0) }}" required />
            </div>
            <div>
                <label for="stock_minimo">Stock Mínimo:</label>
                <input type="number" min="0" name="stock_minimo" id="stock_minimo" value="{{ old('stock_minimo', 0) }}" />
            </div>
        </div>

        <div class="mb-4">
            <label for="imagen_url">Imagen (URL):</label>
            <input type="url" id="imagen_url" name="imagen_url" value="{{ old('imagen_url') }}" />
        </div>

        <div class="actions">
            <a href="{{ route('admin.productos.index') }}" class="btn-back">← Volver a la lista</a>
            <button type="submit" class="btn-submit">Guardar Producto</button>
        </div>

    </form>

</body>

</html>

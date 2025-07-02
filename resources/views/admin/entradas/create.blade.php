<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registrar Entrada</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            color: #1f2937;
            font-family: sans-serif;
            padding: 1.5rem;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }

        .title {
            font-size: 1.25rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #1e40af;
        }

        .back-link {
            display: block;
            margin-bottom: 1rem;
            color: #2563eb;
            text-decoration: underline;
            font-weight: 500;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-input,
        .form-select {
            width: 100%;
            padding: 0.5rem 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            margin-bottom: 1.25rem;
        }

        .form-input:focus,
        .form-select:focus {
            outline: none;
            ring: 2px;
            border-color: #2563eb;
        }

        .form-error {
            background-color: #fee2e2;
            color: #991b1b;
            padding: 0.75rem;
            border-radius: 0.5rem;
            margin-bottom: 1rem;
        }

        .form-error ul {
            list-style: disc;
            padding-left: 1.5rem;
        }

        .submit-button {
            background-color: #2563eb;
            color: white;
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            transition: background-color 0.2s ease;
        }

        .submit-button:hover {
            background-color: #1d4ed8;
        }

        .form-actions {
            display: flex;
            justify-content: flex-end;
        }
    </style>
</head>

<body>

    <a href="{{ route('admin.dashboard') }}" class="back-link">← Volver al Dashboard</a>

    <div class="container">
        <h2 class="title">Registrar Entrada</h2>

        @if ($errors->any())
        <div class="form-error">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.entradas.store') }}">
            @csrf

            <label class="form-label" for="producto_id">Producto:</label>
            <select name="producto_id" id="producto_id" required class="form-select">
                @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>

            <label class="form-label" for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" required class="form-input">

            <label class="form-label" for="costo_unitario">Costo Unitario (opcional):</label>
            <input type="number" step="0.01" name="costo_unitario" id="costo_unitario" class="form-input">

            <div class="form-actions">
                <button type="submit" class="submit-button">Registrar</button>
            </div>
        </form>
    </div>

</body>

</html>

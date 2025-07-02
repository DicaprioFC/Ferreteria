<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Agregar Proveedor</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f3f4f6;
            font-family: 'Segoe UI', sans-serif;
        }

        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .form-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e3a8a;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .btn-submit {
            background-color: #2563eb;
            color: #ffffff;
            padding: 0.5rem 1.25rem;
            border-radius: 0.5rem;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
        }

        .btn-cancel {
            color: #6b7280;
            font-weight: 500;
            text-decoration: underline;
            margin-right: 1rem;
        }

        .input-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .input-field {
            width: 100%;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
            outline: none;
        }

        .input-field:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.4);
        }

        .error-box {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }

        .back-link {
            display: inline-block;
            color: #4b5563;
            margin-bottom: 1rem;
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="form-container">
        <h1 class="form-title">➕ Agregar Nuevo Proveedor</h1>

        <a href="{{ route('admin.proveedores.index') }}" class="back-link">← Lista de Proveedores</a>

        @if ($errors->any())
        <div class="error-box">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.proveedores.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nombre" class="input-label">Nombre <span class="text-red-600">*</span></label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre') }}" required class="input-field">
            </div>

            <div class="mb-4">
                <label for="email" class="input-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" class="input-field">
            </div>

            <div class="mb-4">
                <label for="telefono" class="input-label">Teléfono</label>
                <input type="text" id="telefono" name="telefono" value="{{ old('telefono') }}" class="input-field">
            </div>

            <div class="mb-6">
                <label for="direccion" class="input-label">Dirección</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion') }}" class="input-field">
            </div>

            <div class="flex justify-end">
                <a href="{{ route('admin.dashboard') }}" class="btn-cancel">Cancelar</a>
                <button type="submit" class="btn-submit">Guardar</button>
            </div>
        </form>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Registrar Salida</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f3f4f6; /* Tailwind bg-gray-100 */
            color: #1f2937; /* Tailwind text-gray-800 */
            padding: 1.5rem; /* Tailwind p-6 */
            font-family: 'Inter', sans-serif;
        }

        .container {
            max-width: 480px;
            margin: 0 auto;
            background-color: #fff; /* Tailwind bg-white */
            padding: 1.5rem; /* Tailwind p-6 */
            border-radius: 0.5rem; /* Tailwind rounded */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Tailwind shadow */
        }

        h2 {
            font-weight: 700;
            font-size: 1.25rem; /* Tailwind text-xl */
            margin-bottom: 1rem; /* Tailwind mb-4 */
            color: #1e40af; /* Tailwind blue-800 */
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        select,
        input[type="number"] {
            width: 100%;
            border: 1px solid #d1d5db; /* Tailwind border-gray-300 */
            padding: 0.5rem 0.75rem; /* Tailwind px-3 py-2 */
            border-radius: 0.375rem; /* Tailwind rounded */
            font-size: 1rem;
            margin-bottom: 1rem; /* Tailwind mb-4 */
            outline: none;
            transition: box-shadow 0.2s ease;
        }

        select:focus,
        input[type="number"]:focus {
            box-shadow: 0 0 0 2px #2563eb; /* Tailwind focus:ring-2 focus:ring-blue-500 */
            border-color: #2563eb;
        }

        .error-message {
            background-color: #fee2e2; /* Tailwind bg-red-100 */
            color: #991b1b; /* Tailwind text-red-800 */
            padding: 0.5rem 1rem;
            border-radius: 0.375rem;
            margin-bottom: 1rem;
        }

        .error-message ul {
            list-style-type: disc;
            padding-left: 1.25rem;
            margin: 0;
        }

        .btn-submit {
            background-color: #2563eb; /* Tailwind bg-blue-600 */
            color: white;
            padding: 0.5rem 1rem; /* Tailwind px-4 py-2 */
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            float: right;
        }

        .btn-submit:hover {
            background-color: #1e40af; /* Tailwind bg-blue-700 */
        }

        a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        a:hover {
            text-decoration: underline;
        }

        .header {
            display: flex;
            justify-content: flex-start;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Registrar Salida</h2>

        <div class="header">
            <a href="{{ route('admin.dashboard') }}">← Volver al Dashboard</a>
        </div>

        @if ($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('admin.salidas.store') }}">
            @csrf

            <label for="producto_id">Producto:</label>
            <select name="producto_id" id="producto_id" required>
                @foreach ($productos as $producto)
                <option value="{{ $producto->id }}">
                    {{ $producto->nombre }} (Stock: {{ $producto->stock }})
                </option>
                @endforeach
            </select>

            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" id="cantidad" min="1" required />

            <label for="precio_unitario">Precio Unitario:</label>
            <input type="number" name="precio_unitario" id="precio_unitario" step="0.01" required />

            <button type="submit" class="btn-submit">Registrar</button>
        </form>
    </div>
</body>

</html>

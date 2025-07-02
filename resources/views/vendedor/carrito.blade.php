<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Carrito</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <style>
        /* Reset y base */
        body {
            background: #f9fafb;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            min-height: 100vh;
        }

        .container {
            background: white;
            max-width: 900px;
            width: 100%;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.1);
            padding: 32px;
        }

        h1 {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            color: #1f2937;
            margin-bottom: 24px;
        }

        a.back-link {
            display: inline-flex;
            align-items: center;
            color: #2563eb;
            font-weight: 600;
            text-decoration: none;
            margin-bottom: 24px;
            font-size: 1rem;
            transition: color 0.3s ease;
        }

        a.back-link:hover {
            color: #1e40af;
        }

        a.back-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        /* Mensajes */
        .message-success {
            background: #dcfce7;
            border: 1px solid #22c55e;
            color: #166534;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
            text-align: center;
            font-weight: 600;
        }

        .message-empty {
            color: #6b7280;
            font-style: italic;
            border: 2px dashed #d1d5db;
            padding: 40px;
            text-align: center;
            border-radius: 10px;
            font-size: 1.1rem;
        }

        /* Tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 10px rgb(0 0 0 / 0.1);
            margin-bottom: 24px;
        }

        thead {
            background-color: #2563eb;
            color: white;
        }

        thead th {
            padding: 14px 20px;
            font-weight: 700;
            text-align: left;
        }

        tbody tr {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.3s ease;
        }

        tbody tr:hover {
            background-color: #f3f4f6;
        }

        tbody td {
            padding: 14px 20px;
            vertical-align: middle;
            color: #374151;
        }

        tbody td img {
            height: 80px;
            object-fit: contain;
            display: block;
            margin: 0 auto;
            border-radius: 8px;
        }

        tbody td:nth-child(4) {
            text-align: center;
            font-weight: 600;
        }

        tbody td:nth-child(5) {
            text-align: center;
        }

        button.delete-btn {
            background: none;
            border: none;
            color: #dc2626;
            font-weight: 600;
            cursor: pointer;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            transition: color 0.3s ease;
        }

        button.delete-btn i {
            margin-right: 6px;
        }

        button.delete-btn:hover {
            color: #991b1b;
        }

        /* Total */
        .total {
            font-size: 2rem;
            font-weight: 900;
            text-align: right;
            color: #111827;
            margin-bottom: 40px;
        }

        /* Formulario */
        form.confirm-sale {
            background: #f3f4f6;
            padding: 32px 28px;
            border-radius: 16px;
            max-width: 480px;
            margin: 0 auto;
            box-shadow: 0 6px 15px rgb(0 0 0 / 0.05);
        }

        form.confirm-sale h2 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 28px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #374151;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 16px;
            border: 2px solid #d1d5db;
            border-radius: 10px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 6px #93c5fd;
        }

        button.submit-btn {
            margin-top: 20px;
            width: 100%;
            background-color: #16a34a;
            color: white;
            font-weight: 700;
            font-size: 1.15rem;
            padding: 14px;
            border: none;
            border-radius: 12px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button.submit-btn:hover {
            background-color: #15803d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Carrito de Compras</h1>

        <a href="{{ route('dashboard') }}" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Volver al Dashboard
        </a>

        @if(session('success'))
        <p class="message-success">{{ session('success') }}</p>
        @endif

        @if(empty($carrito))
        <p class="message-empty">El carrito está vacío.</p>
        @else
        <table>
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
                    <td><img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" /></td>
                    <td>Bs {{ number_format($item['precio'], 2) }}</td>
                    <td>{{ $item['cantidad'] }}</td>
                    <td>
                        <form action="{{ route('carrito.eliminar', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-btn">
                                <i class="fa-solid fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @php
        $total = 0;
        foreach ($carrito as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
        @endphp

        <div class="total">
            Total: Bs {{ number_format($total, 2) }}
        </div>

        <form action="{{ route('carrito.confirmar') }}" method="POST" class="confirm-sale">
            @csrf
            <h2>Datos del Cliente</h2>

            <label for="nombre_cliente">Nombre del Cliente</label>
            <input type="text" name="nombre_cliente" id="nombre_cliente" placeholder="Opcional" />

            <label for="ci_cliente" style="margin-top: 20px;">CI/NIT del Cliente</label>
            <input type="text" name="ci_cliente" id="ci_cliente" placeholder="Opcional" />

            <button type="submit" class="submit-btn">Confirmar Venta</button>
        </form>
        @endif
    </div>
</body>

</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Venta Exitosa</title>
    <script src="https://kit.fontawesome.com/0e56a6d8f1.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #ecfdf5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff;
            max-width: 900px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            padding: 32px;
            border: 2px solid #bbf7d0;
        }

        .header {
            text-align: center;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5rem;
            color: #059669;
            font-weight: 900;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
        }

        .header p {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .info {
            background-color: #f9fafb;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .info-label {
            font-size: 0.9rem;
            color: #6b7280;
        }

        .info-value {
            font-size: 1.2rem;
            font-weight: 600;
            color: #111827;
        }

        .info-total {
            font-size: 1.5rem;
            font-weight: 800;
            color: #047857;
        }

        .table-section h2 {
            font-size: 1.3rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
        }

        thead {
            background-color: #d1fae5;
        }

        thead th {
            padding: 12px;
            text-align: left;
            font-weight: 700;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        tbody td {
            padding: 12px;
            text-align: center;
            border: 1px solid #e5e7eb;
            color: #374151;
        }

        tbody tr:hover {
            background-color: #f3f4f6;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .back-link {
            color: #2563eb;
            text-decoration: none;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .back-link:hover {
            color: #1d4ed8;
        }

        .pdf-btn {
            background-color: #dc2626;
            color: white;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 700;
            text-decoration: none;
            transition: background-color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .pdf-btn:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Encabezado -->
        <div class="header">
            <h1><i class="fa-solid fa-circle-check"></i> ¡Venta Realizada!</h1>
            <p>Los datos de la transacción se han guardado correctamente.</p>
        </div>

        <!-- Información del cliente -->
        <div class="info">
            <div class="info-grid">
                <div>
                    <p class="info-label">Cliente:</p>
                    <p class="info-value">{{ $venta->nombre_cliente ?? 'Sin nombre' }}</p>
                </div>
                <div>
                    <p class="info-label">CI/NIT:</p>
                    <p class="info-value">{{ $venta->ci_cliente ?? 'Sin CI' }}</p>
                </div>
                <div>
                    <p class="info-label">Fecha:</p>
                    <p class="info-value">{{ $venta->fecha }}</p>
                </div>
                <div>
                    <p class="info-label">Total:</p>
                    <p class="info-total">Bs {{ number_format($venta->total, 2) }}</p>
                </div>
            </div>
        </div>

        <!-- Detalles de la venta -->
        <div class="table-section">
            <h2><i class="fa-solid fa-receipt"></i> Detalles de la venta</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($venta->detalles as $detalle)
                        <tr>
                            <td>{{ $detalle->producto->nombre }}</td>
                            <td>{{ $detalle->cantidad }}</td>
                            <td>Bs {{ number_format($detalle->precio_unitario, 2) }}</td>
                            <td>Bs {{ number_format($detalle->precio_unitario * $detalle->cantidad, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botones -->
        <div class="actions">
            <a href="{{ route('dashboard') }}" class="back-link">
                <i class="fa-solid fa-arrow-left"></i> Volver al Dashboard
            </a>

            <a href="{{ route('ventas.pdf', $venta->id) }}" class="pdf-btn">
                <i class="fa-solid fa-file-pdf"></i> Descargar PDF
            </a>
        </div>
    </div>

</body>
</html>

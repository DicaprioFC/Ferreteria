<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Factura Venta</title>
    <style>
        body { font-family: DejaVu Sans; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 5px; }
    </style>
</head>
<body>
    <h2>Factura de Venta #{{ $venta->id }}</h2>
    <p><strong>Cliente:</strong> {{ $venta->cliente_nombre }} (CI: {{ $venta->cliente_ci }})</p>
    <p><strong>Fecha:</strong> {{ $venta->created_at->format('d/m/Y H:i') }}</p>

    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach ($venta->detalles as $detalle)
                @php $sub = $detalle->cantidad * $detalle->precio_unitario; $total += $sub; @endphp
                <tr>
                    <td>{{ $detalle->producto->nombre }}</td>
                    <td>{{ $detalle->cantidad }}</td>
                    <td>Bs. {{ number_format($detalle->precio_unitario, 2) }}</td>
                    <td>Bs. {{ number_format($sub, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h3>Total: Bs. {{ number_format($total, 2) }}</h3>
</body>
</html>

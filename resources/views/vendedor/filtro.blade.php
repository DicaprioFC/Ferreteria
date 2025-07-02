<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f9fafb;
            margin: 0;
            padding: 20px;
            color: #1f2937;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 16px;
        }

        h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            color: #2563eb;
            text-align: center;
        }

        a {
            text-decoration: none;
            color: #2563eb;
        }

        a:hover {
            text-decoration: underline;
        }

        .flex {
            display: flex;
        }

        .justify-end {
            justify-content: flex-end;
        }

        .mb-4 {
            margin-bottom: 1rem;
        }

        .relative {
            position: relative;
        }

        .inline-block {
            display: inline-block;
        }

        .text-blue-600 {
            color: #2563eb;
        }

        .text-xs {
            font-size: 0.75rem;
        }

        .font-bold {
            font-weight: 700;
        }

        .bg-red-600 {
            background-color: #dc2626;
        }

        .text-white {
            color: white;
        }

        .rounded-full {
            border-radius: 9999px;
        }

        .px-2 {
            padding-left: 0.5rem;
            padding-right: 0.5rem;
        }

        .py-0\.5 {
            padding-top: 0.125rem;
            padding-bottom: 0.125rem;
        }

        .absolute {
            position: absolute;
        }

        .-top-2 {
            top: -0.5rem;
        }

        .-right-3 {
            right: -0.75rem;
        }

        /* Contenedor productos */
        .container-products {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }

        .card-product {
            background: white;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgb(0 0 0 / 0.1);
            width: 220px;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .card-product:hover {
            transform: translateY(-5px);
        }

        .container-img {
            position: relative;
            width: 100%;
            height: 220px;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f3f4f6;
            padding: 10px;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            overflow: hidden;
        }

        .container-img img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
            border-radius: 10px;
        }

        .button-group {
            position: absolute;
            top: 10px;
            right: 10px;
            display: flex;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card-product:hover .button-group {
            opacity: 1;
        }

        .button-group span {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 6px;
            border-radius: 50%;
            font-size: 1rem;
            color: #2563eb;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .button-group span:hover {
            background-color: #2563eb;
            color: white;
        }

        .content-card-product {
            padding: 15px 20px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stars {
            color: #fbbf24;
            margin-bottom: 8px;
            font-size: 1rem;
        }

        h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0 0 10px 0;
            color: #111827;
        }

        form.inline {
            display: inline;
        }

        button.add-cart {
            background-color: #2563eb;
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        button.add-cart:hover {
            background-color: #1e40af;
        }

        .price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #16a34a;
            margin-top: 10px;
        }

        /* Responsive */
        @media (max-width: 640px) {
            .container-products {
                justify-content: center;
            }

            .card-product {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Resultados de Búsqueda</h1>

        <a href="{{ route('dashboard') }}" class="text-blue-600 underline mb-4 inline-block">← Volver al Dashboard</a>

        <div class="flex justify-end mb-4">
            <a href="{{ route('carrito.ver') }}" class="relative inline-block">
                <i class="fa-solid fa-cart-shopping text-3xl text-blue-700"></i>
                @if(isset($cantidadCarrito) && $cantidadCarrito > 0)
                <span class="absolute -top-2 -right-3 bg-red-600 text-white text-xs font-bold px-2 py-0.5 rounded-full">
                    {{ $cantidadCarrito }}
                </span>
                @endif
            </a>
        </div>

        @if($categorias->isEmpty())
        <p>No se encontraron productos.</p>
        @else
        @foreach ($categorias as $categoria)
        <section class="mb-10">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">{{ $categoria->nombre }}</h2>

            <div class="container-products">
                @forelse ($categoria->productos as $producto)
                <div class="card-product">
                    <div class="container-img">
                        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}">
                        <div class="button-group">
                            <span><i class="fa-regular fa-eye"></i></span>
                            <span><i class="fa-regular fa-heart"></i></span>
                            <span><i class="fa-solid fa-code-compare"></i></span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>{{ $producto->nombre }}</h3>

                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="add-cart" title="Agregar al carrito">
                                <i class="fa-solid fa-basket-shopping"></i>
                            </button>
                        </form>

                        <p class="price">Bs.&nbsp;{{ number_format($producto->precio_venta, 2, '.', ',') }}</p>

                    </div>
                </div>
                @empty
                <p class="text-gray-500">No hay productos en esta categoría.</p>
                @endforelse
            </div>
        </section>
        @endforeach
        @endif
    </div>
</body>

</html>

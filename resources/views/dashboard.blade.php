<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>Dashboard Vendedor</title>

    <!-- Fuente Inter para mejor legibilidad -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" 
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" 
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        /* TIPOGRAFÍA BASE */
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            color: #111827;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }

        /* CONTENEDOR PRINCIPAL */
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        /* CARRITO */
        .relative.inline-block {
            position: relative;
            cursor: pointer;
        }

        .fa-cart-shopping {
            color: #2563eb;
            transition: color 0.3s ease;
            font-size: 2.5rem; /* aumenta tamaño (40px aprox.) */
        }

        .fa-cart-shopping:hover {
            color: #1e40af;
        }

        .relative.inline-block > span {
            position: absolute;
            top: -8px;
            right: -10px;
            background-color: #dc2626;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 9999px;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
            user-select: none;
            pointer-events: none;
            transform-origin: center;
            animation: pop-in 0.3s ease forwards;
        }

        @keyframes pop-in {
            0% {
                transform: scale(0.5);
                opacity: 0;
            }

            80% {
                transform: scale(1.2);
                opacity: 1;
            }

            100% {
                transform: scale(1);
            }
        }

        /* HEADER */
        .dashboard-header {
            background-color: #ffffff;
            padding: 1.5rem;
            margin-bottom: 2rem;
            border-radius: 0.75rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .dashboard-header h1 {
            margin: 0 auto;
            color: #1e3a8a;
            font-size: 1.75rem;
            font-weight: 700;
        }

        /* FORM BUSQUEDA */
        .search-form {
            flex: 1;
            max-width: 600px;
        }

        .search-form form {
            display: flex;
            flex-wrap: nowrap;
            align-items: center;
            gap: 0.5rem;
            background-color: #f9fafb;
            padding: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e5e7eb;
        }

        .search-form input,
        .search-form select {
            flex: 1 1 auto;
            min-width: 0;
            background-color: #ffffff;
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            font-size: 1rem;
        }

        .search-form button {
            flex-shrink: 0;
            background-color: #2563eb;
            color: white;
            border-radius: 0.5rem;
            padding: 0.5rem 1rem;
            white-space: nowrap;
            font-weight: 600;
            font-size: 1rem;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-form button:hover {
            background-color: #1e40af;
        }

        /* CARRITO ICON */
        .cart-button {
            position: relative;
            cursor: pointer;
            display: inline-block;
        }

        .cart-button span {
            position: absolute;
            top: -8px;
            right: -10px;
            background-color: #dc2626;
            color: white;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 2px 6px;
            border-radius: 9999px;
            box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
            user-select: none;
            pointer-events: none;
            transform-origin: center;
            animation: pop-in 0.3s ease forwards;
        }

        /* CONTENEDOR DE PRODUCTOS */
        .container-products {
            display: grid;
            grid-template-columns: repeat(auto-fit, 220px);
            gap: 1.5rem;
            justify-content: center;
        }

        /* TARJETA DE PRODUCTO */
        .card-product {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgb(0 0 0 / 0.1);
            overflow: hidden;
            transition: box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            cursor: pointer;
            max-width: 220px;
            user-select: none;
        }

        .card-product:hover {
            box-shadow: 0 10px 24px rgb(0 0 0 / 0.15);
        }

        .container-img {
            position: relative;
            overflow: hidden;
            height: 160px;
        }

        .container-img img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.3s ease;
            border-bottom: 1px solid #e5e7eb;
        }

        .card-product:hover .container-img img {
            transform: scale(1.1);
        }

        .button-group {
            position: absolute;
            top: 8px;
            right: 8px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .card-product:hover .button-group {
            opacity: 1;
        }

        .button-group span {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 6px 8px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            color: #374151;
            transition: background-color 0.3s ease;
        }

        .button-group span:hover {
            background-color: #2563eb;
            color: white;
        }

        .content-card-product {
            padding: 1rem;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .stars {
            color: #fbbf24;
            margin-bottom: 0.5rem;
        }

        .stars i {
            margin-right: 2px;
        }

        .card-product h3 {
            font-weight: 700;
            font-size: 1.1rem;
            margin: 0 0 0.5rem 0;
            color: #1e40af;
        }

        .add-cart {
            background-color: #2563eb;
            border: none;
            border-radius: 0.5rem;
            padding: 0.5rem 0.75rem;
            color: white;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            align-self: flex-start;
        }

        .add-cart:hover {
            background-color: #1e40af;
        }

        .price {
            font-weight: 700;
            color: #111827;
            margin-top: 0.75rem;
            font-size: 1rem;
            text-align: right;
        }

        /* TEXTO DE SIN PRODUCTOS */
        .text-gray-500 {
            color: #6b7280;
            font-style: italic;
            text-align: center;
            margin-top: 1rem;
        }

        /* RESPONSIVE */
        @media (max-width: 640px) {
            .dashboard-header {
                flex-direction: column;
            }

            .search-form form {
                flex-direction: column;
            }

            .search-form input,
            .search-form select,
            .search-form button {
                width: 100%;
                margin-bottom: 0.5rem;
            }

            .container-products {
                grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
                justify-content: center;
            }

            .card-product {
                max-width: 100%;
            }
        }
    </style>
</head>

<body>

    <header class="dashboard-header">
        <h1>Dashboard de Vendedor</h1>

        <form method="POST" action="{{ route('logout') }}" class="logout-btn">
            @csrf
            <button type="submit" class="logout-button">
                Salir <i class="fa-solid fa-arrow-right-from-bracket"></i>
            </button>
        </form>

        <div class="search-form">
            <form method="GET" action="{{ route('vendedor.filtro') }}">
                <input type="text" name="busqueda" placeholder="Buscar por nombre o código..." value="{{ request('busqueda') }}" />
                <select name="categoria">
                    <option value="">Todas las categorías</option>
                    @foreach($categorias as $cat)
                    <option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->nombre }}
                    </option>
                    @endforeach
                </select>
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i> Buscar</button>
            </form>
        </div>

        <a href="{{ route('carrito.ver') }}" class="cart-button relative inline-block" aria-label="Ver carrito">
            <i class="fa-solid fa-cart-shopping"></i>
            @if(isset($cantidadCarrito) && $cantidadCarrito > 0)
            <span>{{ $cantidadCarrito }}</span>
            @endif
        </a>
    </header>

    <main class="container">
        @foreach ($categorias as $categoria)
        <section class="mb-10">
            <h2 class="text-xl font-semibold text-blue-800 mb-4">{{ $categoria->nombre }}</h2>

            <div class="container-products">
                @forelse ($categoria->productos as $producto)
                <div class="card-product" tabindex="0">
                    <div class="container-img">
                        <img src="{{ $producto->imagen_url }}" alt="{{ $producto->nombre }}" />
                        <div class="button-group" aria-label="Opciones de producto">
                            <span title="Ver detalles"><i class="fa-regular fa-eye"></i></span>
                            <span title="Agregar a favoritos"><i class="fa-regular fa-heart"></i></span>
                            <span title="Comparar"><i class="fa-solid fa-code-compare"></i></span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars" aria-label="Calificación">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>{{ $producto->nombre }}</h3>

                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="add-cart" aria-label="Agregar {{ $producto->nombre }} al carrito">
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
    </main>

</body>

</html>

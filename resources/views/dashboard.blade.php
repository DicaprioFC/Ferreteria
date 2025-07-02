<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Dashboard Vendedor</title>

	<!-- Fuente Inter para mejor legibilidad -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="styles.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<style>
		/* TIPOGRAFÍA BASE */
		body {
			font-family: 'Inter', sans-serif;
			-webkit-font-smoothing: antialiased;
			-moz-osx-font-smoothing: grayscale;
			color: #111827;
			background-color: #f3f4f6;
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

		.relative.inline-block>span {
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
		}

		.dashboard-header h1 {
			margin-bottom: 1.5rem;
			color: #1e3a8a;
			text-align: center;
			font-size: 1.5rem;
			font-weight: 700;
		}

		.header-flex {
			display: flex;
			align-items: center;
			justify-content: space-between;
			flex-wrap: wrap;
			gap: 1rem;
		}

		.logout-btn flux\:menu\.item {
			display: inline-flex;
			align-items: center;
			justify-content: center;
			background-color: #dc2626;
			color: white;
			padding: 0.5rem 1rem;
			border-radius: 0.5rem;
			font-weight: 600;
			cursor: pointer;
			transition: background-color 0.3s ease;
		}

		.logout-btn flux\:menu\.item:hover {
			background-color: #b91c1c;
		}

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
		}

		.search-form button {
			flex-shrink: 0;
			background-color: #2563eb;
			color: white;
			border-radius: 0.5rem;
			padding: 0.5rem 1rem;
			white-space: nowrap;
			transition: background-color 0.3s ease;
		}

		.search-form button:hover {
			background-color: #1e40af;
		}
	</style>
</head>

<body>

<<<<<<< HEAD
	<div class="container mx-auto p-6 dashboard-header">

		<h1>Dashboard de Vendedor</h1>

		<div class="header-flex">

			<!-- LOGOUT -->
			<form method="POST" action="{{ route('logout') }}" class="logout-btn">
				@csrf
				<flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle">
					{{ __('Salir') }}
				</flux:menu.item>
			</form>

			<!-- BUSCADOR -->
			<div class="search-form">
				<form method="GET" action="{{ route('vendedor.filtro') }}">
					<input type="text" name="busqueda" placeholder="Buscar por nombre o código..." value="{{ request('busqueda') }}">
					<select name="categoria">
						<option value="">Todas las categorías</option>
						@foreach($categorias as $cat)
						<option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
							{{ $cat->nombre }}
						</option>
						@endforeach
					</select>
					<button type="submit">
						<i class="fa-solid fa-magnifying-glass mr-2"></i>Buscar
					</button>
				</form>
			</div>

			<!-- CARRITO -->
			<a href="{{ route('carrito.ver') }}" class="relative inline-block">
				<i class="fa-solid fa-cart-shopping text-3xl text-blue-700"></i>
=======
<header class="dashboard-header">
	<div class="dashboard-header-top">
		<h1 class="dashboard-header-title">Dashboard de Vendedor</h1>

		<form method="POST" action="{{ route('logout') }}">
			@csrf
			<flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="logout-button">
				{{ __('Log Out') }}
			</flux:menu.item>
		</form>
	</div>

	<form method="GET" action="{{ route('vendedor.filtro') }}">
		<div class="dashboard-header-bottom">
			<input
				type="text"
				name="busqueda"
				placeholder="Buscar por nombre o código..."
				value="{{ request('busqueda') }}" />

			<select name="categoria">
				<option value="">Todas las categorías</option>
				@foreach($categorias as $cat)
				<option value="{{ $cat->id }}" {{ request('categoria') == $cat->id ? 'selected' : '' }}>
					{{ $cat->nombre }}
				</option>
				@endforeach
			</select>

			<button type="submit">Buscar</button>

			<a href="{{ route('carrito.ver') }}" class="cart-button">
				<i class="fa-solid fa-cart-shopping"></i>
>>>>>>> c300b40c61fa9989320edcaf465a42f2e8b7b272
				@if(isset($cantidadCarrito) && $cantidadCarrito > 0)
				<span>{{ $cantidadCarrito }}</span>
				@endif
			</a>
		</div>
<<<<<<< HEAD
	</div>
=======
	</form>
</header>
>>>>>>> c300b40c61fa9989320edcaf465a42f2e8b7b272

	<div class="container mx-auto p-6">
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
							<button type="submit" class="add-cart">
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
	</div>

</body>

</html>

<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<title>Dashboard Vendedor</title>
	<link rel="stylesheet" href="styles.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<style>
		/* Contenedor del carrito */
		.relative.inline-block {
			position: relative;
			cursor: pointer;
		}

		/* Icono del carrito */
		.fa-cart-shopping {
			color: #2563eb;
			/* azul Tailwind-600 */
			transition: color 0.3s ease;
		}

		.fa-cart-shopping:hover {
			color: #1e40af;
			/* azul más oscuro al pasar el mouse */
		}

		/* Contador de cantidad */
		.relative.inline-block>span {
			position: absolute;
			top: -8px;
			right: -10px;
			background-color: #dc2626;
			/* rojo Tailwind-600 */
			color: white;
			font-size: 0.75rem;
			/* text-xs */
			font-weight: 700;
			padding: 2px 6px;
			border-radius: 9999px;
			/* completamente redondeado */
			box-shadow: 0 0 4px rgba(0, 0, 0, 0.2);
			user-select: none;
			pointer-events: none;

			/* Animación de aparición */
			transform-origin: center;
			animation: pop-in 0.3s ease forwards;
		}

		/* Animación para que el contador "salte" cuando cambia */
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
	</style>
</head>

<body class="bg-gray-100">

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
				@if(isset($cantidadCarrito) && $cantidadCarrito > 0)
				<span>{{ $cantidadCarrito }}</span>
				@endif
			</a>
		</div>
	</form>
</header>

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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda</title>
    <link rel="stylesheet" href="/styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
</head>
<body>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Resultados de Búsqueda</h1>

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
        @endif
    </div>
</body>
</html>

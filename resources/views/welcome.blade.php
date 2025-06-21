<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>inicio sin usuarios</title>

</head>

<body class=>
<header>
    <div class="container-hero">
        <div class="container hero">
            <div class="customer-support">
                <!-- Podrías colocar algo aquí si necesitas -->
            </div>

            <div class="container-logo">
                <h1 class="logo"><a href="/">KFierrote</a></h1>
            </div>

            @if (Route::has('login'))
            <div class="auth-links">
                @auth
                <!--<a href="{{ url('/dashboard') }}">Dashboard</a>-->
                @else
                <a href="{{ route('login') }}">Log in</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
    </div>
</header>


    <section class="banner">
        <div class="content-banner">
            <p>Las mejores herramientas :D</p>
            <h2>KFierrote <br />Herramientas Nuevas</h2>
            <a href="{{ route('login') }}">Inicia sesion para ver todo tu inventario y ventas</a>
        </div>
    </section>


    <section class="gallery">
        <img
            src="https://upload.wikimedia.org/wikipedia/commons/8/82/Hand_tools.jpg"
            alt="Gallery Img1"
            class="gallery-img-1" /><img
            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStYVBEHMgq3zWxVXhHKrhGsuhv54CifRoQLg&s"
            alt="Gallery Img2"
            class="gallery-img-2" /><img
            src="https://blog.homedepot.com.mx/wp-content/uploads/2024/06/marcas-de-herramientas-1024x663.png"
            alt="Gallery Img3"
            class="gallery-img-3" /><img
            src="https://nortecmx.com/wp-content/uploads/2024/02/herramientas_industriales_blog-1024x536.jpg"
            alt="Gallery Img4"
            class="gallery-img-4" /><img
            src="https://cmicveracruzsur.org/wp-content/uploads/2021/08/1500x844_salud_construccion.jpg"
            alt="Gallery Img5"
            class="gallery-img-5" />
    </section>




    @if (Route::has('login'))
    <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
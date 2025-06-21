<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0" />
    <title>KFierrote</title>
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="container-hero">
            <div class="container hero">
                <div class="customer-support">

                </div>

                <div class="container-logo">

                    <h1 class="logo"><a href="/">KFierrote</a></h1>

                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Cerrar Sesión</button>
                </form>

                <div class="container-user">
                </div>
            </div>
        </div>
    </header>

    <section class="banner">
        <div class="content-banner">
            <p>Las mejores herramientas :D</p>
            <h2>KFierrote <br />Herramientas Nuevas</h2>
            <a href="#">Comprar ahora</a>
        </div>
    </section>

    <main class="main-content">
        <section class="container container-features">

        </section>

        <section class="container top-categories">
            <h1 class="heading-1">Mejores Categorías</h1>
            <div class="container-categories">
                <div class="card-category categoria-hogar">
                    <p>Hogar</p>
                    <span>Ver más</span>
                </div>
                <div class="card-category categoria-carpinteria">
                    <p>Carpinteria</p>
                    <span>Ver más</span>
                </div>
                <div class="card-category category-const">
                    <p>Construccion</p>
                    <span>Ver más</span>
                </div>
            </div>
        </section>

        <section class="container top-products">
            <h1 class="heading-1">Mejores Productos</h1>



            <div class="container-products">
                <div class="card-product">
                    <div class="container-img">
                        <img src="https://promart.vteximg.com.br/arquivos/ids/440563-1000-1000/70408.jpg?v=637248118716230000" alt="" />
                        <span class="discount">-13%</span>
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
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
                        <h3>Martillo</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$4.60 <span>$5.30</span></p>
                    </div>
                </div>
                <div class="card-product">
                    <div class="container-img">
                        <img
                            src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss"
                            alt="" />
                        <span class="discount">-22%</span>
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Destornillador</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$5.70 <span>$7.30</span></p>
                    </div>
                </div>
                <div class="card-product">
                    <div class="container-img">
                        <img
                            src="https://www.hi.com.bo/media/catalog/product/cache/14571f4b1adf7f9633f3acff66f6808e/s/i/sierra-circular-gks-235-bosch_1.jpg"
                            alt="" />
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h3>Sierra</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$133.20</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://libreriairbe.com/wp-content/uploads/2023/08/Cautin-para-Soldar-Estano-Tipo-Lapiz-60-W-KAMASA.jpg" alt="" />
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
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
                        <h3>Cautin</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$5.60</p>
                    </div>
                </div>
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

        <section class="container specials">
            <h1 class="heading-1">Hogar</h1>

            <div class="container-products">
                <div class="card-product">
                    <div class="container-img">
                        <img src="https://www.constructorbolivia.com/wp-content/uploads/2022/07/12-escaleras.png" alt="Cafe Irish" />

                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
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
                        <h3>Cafe Irish</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$1.500</span></p>
                    </div>
                </div>
                <div class="card-product">
                    <div class="container-img">
                        <img
                            src="https://libreriairbe.com/wp-content/uploads/2023/08/Brocha-de-Uso-General-con-Mango-de-Plastico-PRETUL-2-50-mm.jpg"
                            alt="Cafe incafe-ingles.jpg" />
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Brocha</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$5.70</span></p>
                    </div>
                </div>
                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQEbBOzvr9OQ9WXaEycQ-1n5TRarUqlidM59Q&s" alt="Cafe Viena" />
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
                        </div>
                    </div>
                    <div class="content-card-product">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h3>Guantes</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$3.85</span></p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQaTUze6JqncAU87K-n_UaHOm2vsnRLctSx3A&s" alt="Cafe Liqueurs" />
                        <div class="button-group">
                            <span>
                                <i class="fa-regular fa-eye"></i>
                            </span>
                            <span>
                                <i class="fa-regular fa-heart"></i>
                            </span>
                            <span>
                                <i class="fa-solid fa-code-compare"></i>
                            </span>
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
                        <h3>Pintura</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$5.60</p>
                    </div>
                </div>
            </div>

        </section>
        <section class="container specials">
            <h1 class="heading-1">Carpinteria</h1>

            <div class="container-products">
                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Multímetro" />
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
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Multímetro</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$18.00</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Atornillador eléctrico" />
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
                        <h3>Atornillador Eléctrico</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$32.50</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Extensión eléctrica" />
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
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Extensión Eléctrica</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$6.90</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Linterna LED" />
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
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h3>Linterna LED</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$12.40</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container specials">
            <h1 class="heading-1">Construccion</h1>

            <div class="container-products">
                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Multímetro" />
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
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Multímetro</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$18.00</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Atornillador eléctrico" />
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
                        <h3>Atornillador Eléctrico</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$32.50</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Extensión eléctrica" />
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
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </div>
                        <h3>Extensión Eléctrica</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$6.90</p>
                    </div>
                </div>

                <div class="card-product">
                    <div class="container-img">
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQFjQHQLEX1fgEuMgFX-35ZA-RVPZOnuFHKGA&ss" alt="Linterna LED" />
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
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <h3>Linterna LED</h3>
                        <span class="add-cart">
                            <i class="fa-solid fa-basket-shopping"></i>
                        </span>
                        <p class="price">$12.40</p>
                    </div>
                </div>
            </div>
        </section>

    </main>
</body>

</html>
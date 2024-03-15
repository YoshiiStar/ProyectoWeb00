<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kickstart Footwear - Sneakers premium de Nike, Adidas, Puma, Vans y más. Calzado de calidad a precios accesibles.">
    <title>Kickstart Footwear</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="kick.css">
    <link rel="stylesheet" href="styleList.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="icon" href="IMG/icon/nike.icon.jpg">
</head>
<body>

    <!-- Cabecera -->
    <div class="head">
        <div class="logo">
            <a href="kick.php"><img src="kickseyy.png" alt="Kickstart Footwear"></a>
        </div>

        <button class="hamburger" id="hamburger" aria-label="Abrir menú">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <nav class="navbar" id="navbar">
            <a href="kick.php" class="active">Inicio</a>
            <a href="hombre.php">Hombre</a>
            <a href="mujeres.php">Mujer</a>
            <a href="Sale.php">Sale</a>
            <?php if (isset($_SESSION['usuario'])): ?>
                <div class="menu-list">
                    <a href="#" class="dropbtn opcion"><?= htmlspecialchars($_SESSION['usuario']['nombres']) ?></a>
                    <div class="menu-list secret-list">
                        <a href="mis_pedidos.php">Mis Pedidos</a>
                        <a href="logout.php">Cerrar Sesión</a>
                    </div>
                </div>
            <?php else: ?>
                <a href="login.php" class="ban">Iniciar Sesión</a>
            <?php endif; ?>
            <?php $cnt = isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>
            <a href="carrito.php" class="carrito-nav">
                <i class="bx bxs-cart"></i>
                <?php if ($cnt > 0): ?><span class="carrito-badge"><?= $cnt ?></span><?php endif; ?>
            </a>
        </nav>
    </div>


    <!-- Carrusel -->
    <header class="header" id="inicio">
        <div class="container-carousel">
            <div class="carruseles" id="slider">
                <section class="slider-section">
                    <img src="IMG/slider/slider1.png" alt="Campaña 1">
                </section>
                <section class="slider-section">
                    <img src="IMG/slider/slider2.png" alt="Campaña 2">
                </section>
                <section class="slider-section">
                    <img src="IMG/slider/slider3.png" alt="Campaña 3">
                </section>
            </div>
            <div class="btn-left"><i class="bx bx-chevron-left"></i></div>
            <div class="btn-right"><i class="bx bx-chevron-right"></i></div>
        </div>
        <div class="container-btn">
            <a href="https://web.whatsapp.com/" class="btn" target="_blank">Comprar Ahora</a>
        </div>
    </header>


    <!-- Productos Destacados -->
    <section class="section-productos" id="productos">
        <h2 class="title">Productos Destacados</h2>

        <div class="productos-grid">

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/adidas-grand-court.avif" alt="Adidas Grand Court Cloudfoam" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">ADIDAS</span>
                    <h3 class="producto-nombre">Grand Court Cloudfoam Blanco</h3>
                    <p class="producto-precio">S/. 199.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/nike-air-force-1.webp" alt="Nike Air Force 1 Low" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">NIKE</span>
                    <h3 class="producto-nombre">Air Force 1 Low White '07</h3>
                    <p class="producto-precio">S/. 299.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/puma-suede-xl.avif" alt="Puma Suede XL" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">PUMA</span>
                    <h3 class="producto-nombre">Suede XL Black/White</h3>
                    <p class="producto-precio">S/. 349.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/adidas-superstar.avif" alt="Adidas Superstar Cloud White" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">ADIDAS</span>
                    <h3 class="producto-nombre">Superstar Cloud White</h3>
                    <p class="producto-precio">S/. 299.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="4">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/nike-dunk-panda.webp" alt="Nike Dunk Low Panda" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">NIKE</span>
                    <h3 class="producto-nombre">Dunk Low Panda</h3>
                    <p class="producto-precio">S/. 299.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="5">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/adidas-forum-low.avif" alt="Adidas Forum Low Blanco" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">ADIDAS</span>
                    <h3 class="producto-nombre">Forum Low Blanco</h3>
                    <p class="producto-precio">S/. 299.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="6">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/vans-old-skool-black.png" alt="Vans Old Skool Black" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">VANS</span>
                    <h3 class="producto-nombre">Old Skool Black</h3>
                    <p class="producto-precio">S/. 249.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="7">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/adidas-samba-og.avif" alt="Adidas Samba OG Negro" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">ADIDAS</span>
                    <h3 class="producto-nombre">Samba OG Negro</h3>
                    <p class="producto-precio">S/. 319.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="8">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/nike-dunk-high-panda.jpeg" alt="Nike Dunk High Panda" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">NIKE</span>
                    <h3 class="producto-nombre">Dunk High Panda</h3>
                    <p class="producto-precio">S/. 349.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="9">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/nike-dunk-valentine.jpeg" alt="Nike Dunk Valentine's Day" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">NIKE</span>
                    <h3 class="producto-nombre">Dunk Valentine's Day</h3>
                    <p class="producto-precio">S/. 349.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="10">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/nike-dunk-sb-black.jpeg" alt="Nike Dunk SB Black" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">NIKE</span>
                    <h3 class="producto-nombre">Dunk SB Black</h3>
                    <p class="producto-precio">S/. 279.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="11">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

            <article class="producto-card">
                <div class="producto-img">
                    <img src="IMG/productos/nike-dunk-sb-taupe.jpeg" alt="Nike Dunk SB Taupe Haze" loading="lazy">
                </div>
                <div class="producto-info">
                    <span class="producto-marca">NIKE</span>
                    <h3 class="producto-nombre">Dunk SB Taupe Haze</h3>
                    <p class="producto-precio">S/. 279.99</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="12">
                        <input type="hidden" name="redirect" value="kick.php">
                        <button type="submit" class="btn-comprar">+ Agregar</button>
                    </form>
                </div>
            </article>

        </div>
    </section>


    <!-- Marcas -->
    <section class="section-marcas" id="marcas">
        <h2 class="title">Nuestras Marcas</h2>
        <div class="marcas-grid">
            <div class="marca-item"><img src="IMG/marcas/nike.svg" alt="Nike" loading="lazy"></div>
            <div class="marca-item"><img src="IMG/marcas/jordan.svg" alt="Jordan" loading="lazy"></div>
            <div class="marca-item"><img src="IMG/marcas/adidas.svg" alt="Adidas" loading="lazy"></div>
            <div class="marca-item"><img src="IMG/marcas/new-balance.svg" alt="New Balance" loading="lazy"></div>
            <div class="marca-item"><img src="IMG/marcas/vans.webp" alt="Vans" loading="lazy"></div>
            <div class="marca-item"><img src="IMG/marcas/converse.svg" alt="Converse" loading="lazy"></div>
        </div>
        <a href="#" class="btn">Ver todas las marcas</a>
    </section>


    <!-- Nosotros -->
    <section class="section-nosotros" id="nosotros">
        <div class="nosotros-contenido">
            <h2 class="title">Nosotros</h2>
            <p class="nosotros-texto">
                Kickstart Footwear es una empresa de comercialización de calzado para hombres y mujeres.
                Nos enfocamos en brindar una experiencia de compra agradable y personalizada, ofreciendo
                productos de alta calidad, diseño innovador y precios accesibles.
            </p>
            <a href="#" class="btn">Saber más</a>
        </div>
    </section>


    <!-- Contacto -->
    <section class="section-contacto" id="contacto">
        <h2 class="title title-dark">Contacto</h2>
        <div class="contacto-grid">
            <div class="contacto-item">
                <i class="bx bx-phone"></i>
                <span>789-256-492</span>
            </div>
            <div class="contacto-item">
                <i class="bx bx-envelope"></i>
                <span>kickstarfootwear@gmail.com</span>
            </div>
            <div class="contacto-item">
                <i class="bx bxl-whatsapp"></i>
                <span>900 979 472</span>
            </div>
            <div class="contacto-item">
                <i class="bx bx-map"></i>
                <span>Calle Prolongación Abraham Ballenas</span>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="footer-contenido">

            <div class="footer-col">
                <img src="kickseyy.png" alt="Kickstart Footwear" class="footer-logo">
                <p class="footer-desc">Tu tienda de sneakers premium con las mejores marcas del mercado.</p>
            </div>

            <div class="footer-col">
                <h4 class="footer-titulo">Navegación</h4>
                <a href="kick.php">Inicio</a>
                <a href="hombre.php">Hombre</a>
                <a href="mujeres.php">Mujer</a>
                <a href="Sale.php">Sale</a>
            </div>

            <div class="footer-col">
                <h4 class="footer-titulo">Contacto</h4>
                <p><i class="bx bx-phone"></i> 789-256-492</p>
                <p><i class="bx bx-envelope"></i> kickstarfootwear@gmail.com</p>
                <p><i class="bx bxl-whatsapp"></i> 900 979 472</p>
            </div>

            <div class="footer-col">
                <h4 class="footer-titulo">Síguenos</h4>
                <div class="footer-redes">
                    <a href="#" aria-label="Instagram"><i class="bx bxl-instagram"></i></a>
                    <a href="#" aria-label="Facebook"><i class="bx bxl-facebook"></i></a>
                    <a href="#" aria-label="TikTok"><i class="bx bxl-tiktok"></i></a>
                    <a href="#" aria-label="WhatsApp"><i class="bx bxl-whatsapp"></i></a>
                </div>
            </div>

        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Kickstart Footwear. Todos los derechos reservados.</p>
        </div>
    </footer>


    <!-- Botón volver arriba -->
    <button class="btn-top" id="btnTop" aria-label="Volver arriba">
        <i class="bx bx-chevron-up"></i>
    </button>


    <script src="script.js"></script>
</body>
</html>

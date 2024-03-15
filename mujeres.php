<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Zapatillas Nike | Mujer</title>
        <link rel="stylesheet" href="mujeres.css">
        <link rel="stylesheet" href="styleList.css"/>
        <link rel="stylesheet" href="shared.css">
        <link rel="stylesheet" href="carrito.css">
        <link rel="icon" href="IMG/icon/nike.icon.jpg">
    </head>
    <body id="B-za">

        <div class="head">
            <div class="logo">
                <a href="kick.php"><img src="kickseyy.png" alt="Kickstart Footwear"></a>
            </div>
            <button class="hamburger" id="hamburger" aria-label="Abrir menú">
                <span></span><span></span><span></span>
            </button>
            <nav class="navbar" id="navbar">
                <a href="kick.php">Inicio</a>
                <a href="hombre.php">Hombre</a>
                <a href="mujeres.php">Mujer</a>
                <a href="sale.php">Sale</a>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="menu-list">
                        <a href="#" class="dropbtn opcion"><?= htmlspecialchars($_SESSION['usuario']['nombres']) ?></a>
                        <div class="menu-list secret-list">
                            <a href="mis_pedidos.php">Mis Pedidos</a>
                            <a href="logout.php">Cerrar Sesión</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="dropbtn ban">Iniciar Sesión</a>
                <?php endif; ?>
                <?php $cnt = isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>
                <a href="carrito.php" class="carrito-nav">
                    <i class="bx bxs-cart"></i>
                    <?php if ($cnt > 0): ?><span class="carrito-badge"><?= $cnt ?></span><?php endif; ?>
                </a>
            </nav>
        </div>

        <p><a class="descu" href="">APROVECHA DESCUENTOS ♡ ¡AQUI!"</a></p>

        <div class="barra-lateral">
            <h2 class="info_pre">MUJER URBANO</h2>
            <H3 class="info_pre">PRECIOS</H3>
            <ul>
                <li class="list-pre"><a href="#B-za" class="precio_bt">S/109.90 - S/319.90</a></li>
                <li class="list-pre"><a href="#M-za" class="precio_bt">S/329.90 - S/529.90</a></li>
                <li class="list-pre"><a href="#A-za" class="precio_bt">S/539.90 - S/739.90</a></li>
            </ul>
        </div>

        <section class="containerpri">
            <div class="container flex center">

                <!-- Precio bajo -->
                <div class="box">
                    <img src="IMG/Mujer/preciobajo/nike1.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Legacy Next Nature</p>
                    <p>Zapatillas para mujer</p>
                    <p class="Precio-Nike">S/259.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="201">
                        <input type="hidden" name="redirect" value="mujeres.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Mujer/preciobajo/nike2.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Legacy Next Nature</p>
                    <p>Zapatillas para mujer</p>
                    <p class="Precio-Nike">S/259.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="202">
                        <input type="hidden" name="redirect" value="mujeres.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Mujer/preciobajo/nike3.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Legacy Next Nature</p>
                    <p>Zapatillas para mujer</p>
                    <p class="Precio-Nike">S/259.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="203">
                        <input type="hidden" name="redirect" value="mujeres.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Mujer/preciobajo/nike4.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Royale 2</p>
                    <p>Zapatillas para mujer</p>
                    <p class="Precio-Nike">S/229.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="204">
                        <input type="hidden" name="redirect" value="mujeres.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Mujer/preciobajo/nike5.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Royale 2</p>
                    <p>Zapatillas tipo mule para mujer</p>
                    <p class="Precio-Nike">S/229.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="205">
                        <input type="hidden" name="redirect" value="mujeres.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Mujer/preciobajo/nike6.webp" alt="" height="210" width="250">
                    <p class="N-P" id="M-za">Nike Court Royale 2</p>
                    <p>Zapatillas Urbano mujer</p>
                    <p class="Precio-Nike">S/229.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="206">
                        <input type="hidden" name="redirect" value="mujeres.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <!-- Precio medio -->
                <div class="container flex center">
                    <div class="box">
                        <img class="img-za" src="IMG/Mujer/preciomedio/nike1.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07 SE</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="207">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/preciomedio/nike2.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="208">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/preciomedio/nike3.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="209">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/preciomedio/nike4.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 07 SE</p>
                        <p>Zapatillas Urbano mujer</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="210">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/preciomedio/nike5.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 07 SE</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="211">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/preciomedio/nike6.webp" alt="" height="210" width="250">
                        <p class="N-P" id="A-za">Nike Air Force 1 07 SE</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="212">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>
                </div>

                <!-- Precio alto -->
                <div class="container flex center">
                    <div class="box">
                        <img src="IMG/Mujer/precioalto/nike1.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk High</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/639.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="213">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/precioalto/nike2.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk High</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/639.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="214">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/precioalto/nike3.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk High</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/639.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="215">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/precioalto/nike4.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk High</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/639.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="216">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/precioalto/nike5.webp" alt="" height="210" width="250">
                        <p class="N-P">Air Jordan 1 Low</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/579.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="217">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Mujer/precioalto/nike6.webp" alt="" height="210" width="250">
                        <p class="N-P">Air Jordan 1 Low</p>
                        <p>Zapatillas para mujer</p>
                        <p class="Precio-Nike">S/579.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="218">
                            <input type="hidden" name="redirect" value="mujeres.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <?php include '_footer.php'; ?>

        <script>
            const ham = document.getElementById('hamburger');
            const nav = document.getElementById('navbar');
            ham.addEventListener('click', () => { ham.classList.toggle('active'); nav.classList.toggle('open'); });
            nav.querySelectorAll('a').forEach(l => l.addEventListener('click', () => { ham.classList.remove('active'); nav.classList.remove('open'); }));
        </script>

    </body>
</html>

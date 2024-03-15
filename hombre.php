<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Zapatillas Nike | Hombre</title>
        <link rel="stylesheet" href="hombre.css">
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
            <h2 class="info_pre">HOMBRE URBANO</h2>
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
                    <img src="IMG/Hombre/preciobajo/nike1.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Royale 2 Next Nature</p>
                    <p>Zapatillas para hombre</p>
                    <p class="Precio-Nike">S/269.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="101">
                        <input type="hidden" name="redirect" value="hombre.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Hombre/preciobajo/nike2.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Royale 2 Next Nature</p>
                    <p>Zapatillas para hombre</p>
                    <p class="Precio-Nike">S/269.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="102">
                        <input type="hidden" name="redirect" value="hombre.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Hombre/preciobajo/nike3.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Vision Low Next Nature</p>
                    <p>Zapatillas para hombre</p>
                    <p class="Precio-Nike">S/299.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="103">
                        <input type="hidden" name="redirect" value="hombre.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Hombre/preciobajo/nike4.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Court Vision Low Next Nature</p>
                    <p>Zapatillas para hombre</p>
                    <p class="Precio-Nike">S/299.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="104">
                        <input type="hidden" name="redirect" value="hombre.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Hombre/preciobajo/nike5.webp" alt="" height="210" width="250">
                    <p class="N-P">Nike Calm</p>
                    <p>Zapatillas tipo mule para hombre</p>
                    <p class="Precio-Nike">S/249.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="105">
                        <input type="hidden" name="redirect" value="hombre.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <div class="box">
                    <img src="IMG/Hombre/preciobajo/nike6.webp" alt="" height="210" width="250">
                    <p class="N-P" id="M-za">Nike Calm</p>
                    <p>Zapatillas Urbano Hombre</p>
                    <p class="Precio-Nike">S/249.90</p>
                    <form action="agregar_carrito.php" method="POST">
                        <input type="hidden" name="id" value="106">
                        <input type="hidden" name="redirect" value="hombre.php">
                        <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                    </form>
                </div>

                <!-- Precio medio -->
                <div class="container flex center">
                    <div class="box">
                        <img class="img-za" src="IMG/Hombre/preciomedio/nike1.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="107">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/preciomedio/nike2.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="108">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/preciomedio/nike3.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="109">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/preciomedio/nike4.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Force 1 '07</p>
                        <p>Zapatillas Urbano Hombre</p>
                        <p class="Precio-Nike">S/529.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="110">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/preciomedio/nike5.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Max AP</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/469.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="111">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/preciomedio/nike6.webp" alt="" height="210" width="250">
                        <p class="N-P" id="A-za">Nike Air Max AP</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/469.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="112">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>
                </div>

                <!-- Precio alto -->
                <div class="container flex center">
                    <div class="box">
                        <img src="IMG/Hombre/precioalto/nike1.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk Low Retro</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/569.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="113">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/precioalto/nike2.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk Low Retro</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/569.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="114">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/precioalto/nike3.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Dunk Low Retro</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/569.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="115">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/precioalto/nike4.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Max Dn</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/629.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="116">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/precioalto/nike5.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Max Dn</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/699.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="117">
                            <input type="hidden" name="redirect" value="hombre.php">
                            <button type="submit" class="btn-agregar-carrito"><i class='bx bxs-cart-add'></i> Agregar al carrito</button>
                        </form>
                    </div>

                    <div class="box">
                        <img src="IMG/Hombre/precioalto/nike6.webp" alt="" height="210" width="250">
                        <p class="N-P">Nike Air Max Dn</p>
                        <p>Zapatillas para hombre</p>
                        <p class="Precio-Nike">S/699.90</p>
                        <form action="agregar_carrito.php" method="POST">
                            <input type="hidden" name="id" value="118">
                            <input type="hidden" name="redirect" value="hombre.php">
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

<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito - Kickstart Footwear</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="kick.css">
    <link rel="stylesheet" href="styleList.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="icon" href="IMG/icon/nike.icon.jpg">
</head>
<body>

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
            <a href="login.php" class="ban">Iniciar Sesión</a>
        <?php endif; ?>
        <?php $cnt = isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>
        <a href="carrito.php" class="carrito-nav active">
            <i class="bx bxs-cart"></i>
            <?php if ($cnt > 0): ?><span class="carrito-badge"><?= $cnt ?></span><?php endif; ?>
        </a>
    </nav>
</div>

<div class="carrito-page">
    <div class="carrito-container">
        <h1 class="carrito-titulo"><i class="bx bxs-cart"></i> Tu Carrito</h1>

        <?php if (empty($_SESSION['carrito'])): ?>
            <div class="carrito-vacio">
                <i class="bx bx-cart"></i>
                <p>Tu carrito está vacío</p>
                <a href="kick.php" class="btn-checkout">Seguir comprando</a>
            </div>
        <?php else: ?>
            <?php
            $total = 0;
            foreach ($_SESSION['carrito'] as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            $envio      = $total >= 300 ? 0 : 15.00;
            $gran_total = $total + $envio;
            ?>
            <div class="carrito-grid">

                <div class="carrito-items">
                    <?php foreach ($_SESSION['carrito'] as $id => $item): ?>
                        <div class="carrito-item">
                            <img src="<?= htmlspecialchars($item['imagen']) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>">
                            <div class="item-info">
                                <h3><?= htmlspecialchars($item['nombre']) ?></h3>
                                <p><?= htmlspecialchars($item['desc']) ?></p>
                                <p class="item-precio">S/. <?= number_format($item['precio'], 2) ?></p>
                            </div>
                            <div class="item-cantidad">
                                <form action="actualizar_carrito.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="hidden" name="accion" value="decrementar">
                                    <button type="submit" class="btn-cantidad">−</button>
                                </form>
                                <span class="cantidad-num"><?= $item['cantidad'] ?></span>
                                <form action="actualizar_carrito.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $id ?>">
                                    <input type="hidden" name="accion" value="incrementar">
                                    <button type="submit" class="btn-cantidad">+</button>
                                </form>
                            </div>
                            <div class="item-subtotal">S/. <?= number_format($item['precio'] * $item['cantidad'], 2) ?></div>
                            <form action="actualizar_carrito.php" method="POST">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="accion" value="eliminar">
                                <button type="submit" class="btn-eliminar" title="Eliminar"><i class="bx bx-trash"></i></button>
                            </form>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="carrito-resumen">
                    <h2>Resumen del pedido</h2>
                    <div class="resumen-linea">
                        <span>Subtotal</span>
                        <span>S/. <?= number_format($total, 2) ?></span>
                    </div>
                    <div class="resumen-linea">
                        <span>Envío</span>
                        <span><?= $envio == 0 ? '<span class="envio-gratis">Gratis</span>' : 'S/. ' . number_format($envio, 2) ?></span>
                    </div>
                    <?php if ($envio > 0): ?>
                        <p class="envio-info">Envío gratis en compras mayores a S/. 300</p>
                    <?php endif; ?>
                    <div class="resumen-total">
                        <span>Total</span>
                        <span>S/. <?= number_format($gran_total, 2) ?></span>
                    </div>
                    <a href="pago.php" class="btn-checkout">Proceder al pago →</a>
                    <a href="kick.php" class="btn-seguir">← Seguir comprando</a>
                </div>

            </div>
        <?php endif; ?>
    </div>
</div>

<?php include '_footer.php'; ?>

<script>
const ham = document.getElementById('hamburger');
const nav = document.getElementById('navbar');
ham.addEventListener('click', () => { ham.classList.toggle('active'); nav.classList.toggle('open'); });
nav.querySelectorAll('a').forEach(l => l.addEventListener('click', () => { ham.classList.remove('active'); nav.classList.remove('open'); }));
</script>
</body>
</html>

<?php
session_start();
$pedido_id = $_SESSION['ultimo_pedido'] ?? null;
unset($_SESSION['ultimo_pedido']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Confirmado - Kickstart Footwear</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="kick.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="icon" href="IMG/icon/nike.icon.jpg">
</head>
<body>

<div class="head">
    <div class="logo">
        <a href="kick.php"><img src="kickseyy.png" alt="Kickstart Footwear"></a>
    </div>
    <nav class="navbar">
        <a href="kick.php">Inicio</a>
        <a href="hombre.php">Hombre</a>
        <a href="mujeres.php">Mujer</a>
        <a href="sale.php">Sale</a>
        <a href="carrito.php" class="carrito-nav"><i class="bx bxs-cart"></i></a>
    </nav>
</div>

<div class="confirmacion-page">
    <div class="confirmacion-card">
        <i class="bx bx-check-circle confirmacion-icon"></i>
        <h1>¡Pedido Confirmado!</h1>
        <?php if ($pedido_id): ?>
            <p class="pedido-numero">N° de pedido: <strong>#<?= str_pad($pedido_id, 6, '0', STR_PAD_LEFT) ?></strong></p>
        <?php endif; ?>
        <p class="confirmacion-msg">Gracias por tu compra. Nos pondremos en contacto contigo para coordinar la entrega.</p>
        <p class="confirmacion-contacto"><i class="bx bxl-whatsapp"></i> Te escribiremos al WhatsApp registrado.</p>
        <a href="kick.php" class="btn-checkout">Seguir comprando</a>
    </div>
</div>

</body>
</html>

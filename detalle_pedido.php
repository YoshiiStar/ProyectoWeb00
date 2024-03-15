<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

$pedido_id  = (int)($_GET['id'] ?? 0);
$usuario_id = (int)$_SESSION['usuario']['id'];

$stmt = $db->prepare("SELECT * FROM pedidos WHERE id = ? AND usuario_id = ?");
$stmt->bind_param("ii", $pedido_id, $usuario_id);
$stmt->execute();
$pedido = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$pedido) {
    header('Location: mis_pedidos.php');
    exit;
}

$stmt2 = $db->prepare("SELECT * FROM pedido_detalles WHERE pedido_id = ?");
$stmt2->bind_param("i", $pedido_id);
$stmt2->execute();
$detalles = $stmt2->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt2->close();

$estado_clases = [
    'pendiente'  => 'badge-pendiente',
    'confirmado' => 'badge-confirmado',
    'enviado'    => 'badge-enviado',
    'entregado'  => 'badge-entregado',
    'cancelado'  => 'badge-cancelado',
];
$estado_labels = [
    'pendiente'  => 'Pendiente',
    'confirmado' => 'Confirmado',
    'enviado'    => 'En camino',
    'entregado'  => 'Entregado',
    'cancelado'  => 'Cancelado',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido #<?= str_pad($pedido['id'], 6, '0', STR_PAD_LEFT) ?> - Kickstart Footwear</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="kick.css">
    <link rel="stylesheet" href="styleList.css">
    <link rel="stylesheet" href="carrito.css">
    <link rel="stylesheet" href="pedidos.css">
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
        <div class="menu-list">
            <a href="#" class="dropbtn opcion"><?= htmlspecialchars($_SESSION['usuario']['nombres']) ?></a>
            <div class="menu-list secret-list">
                <a href="mis_pedidos.php">Mis Pedidos</a>
                <a href="logout.php">Cerrar Sesión</a>
            </div>
        </div>
        <?php $cnt = isset($_SESSION['carrito']) ? array_sum(array_column($_SESSION['carrito'], 'cantidad')) : 0; ?>
        <a href="carrito.php" class="carrito-nav">
            <i class="bx bxs-cart"></i>
            <?php if ($cnt > 0): ?><span class="carrito-badge"><?= $cnt ?></span><?php endif; ?>
        </a>
    </nav>
</div>

<div class="pedidos-page">
    <div class="pedidos-container">

        <div class="detalle-header">
            <a href="mis_pedidos.php" class="btn-volver"><i class="bx bx-arrow-back"></i> Mis pedidos</a>
            <div class="detalle-titulo-row">
                <h1>Pedido <span>#<?= str_pad($pedido['id'], 6, '0', STR_PAD_LEFT) ?></span></h1>
                <span class="pedido-badge <?= $estado_clases[$pedido['estado']] ?? 'badge-pendiente' ?>">
                    <?= $estado_labels[$pedido['estado']] ?? $pedido['estado'] ?>
                </span>
            </div>
            <p class="detalle-fecha">Realizado el <?= date('d/m/Y \a \l\a\s H:i', strtotime($pedido['created_at'])) ?></p>
        </div>

        <div class="detalle-grid">

            <!-- Productos -->
            <div class="detalle-productos">
                <h2>Productos</h2>
                <div class="detalle-items">
                    <?php foreach ($detalles as $d): ?>
                        <div class="detalle-item">
                            <div class="detalle-item-info">
                                <p class="detalle-item-nombre"><?= htmlspecialchars($d['nombre_producto']) ?></p>
                                <p class="detalle-item-qty">Cantidad: <?= $d['cantidad'] ?></p>
                                <p class="detalle-item-unit">S/. <?= number_format($d['precio_unitario'], 2) ?> c/u</p>
                            </div>
                            <span class="detalle-item-sub">S/. <?= number_format($d['precio_unitario'] * $d['cantidad'], 2) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="detalle-totales">
                    <div class="resumen-linea"><span>Subtotal</span><span>S/. <?= number_format($pedido['subtotal'], 2) ?></span></div>
                    <div class="resumen-linea">
                        <span>Envío</span>
                        <span><?= $pedido['envio'] == 0 ? '<span class="envio-gratis">Gratis</span>' : 'S/. ' . number_format($pedido['envio'], 2) ?></span>
                    </div>
                    <div class="resumen-total"><span>Total</span><span>S/. <?= number_format($pedido['total'], 2) ?></span></div>
                </div>
            </div>

            <!-- Info del pedido -->
            <div class="detalle-info">
                <div class="detalle-bloque">
                    <h2><i class="bx bx-map"></i> Dirección de entrega</h2>
                    <p class="detalle-nombre"><?= htmlspecialchars($pedido['nombre_cliente']) ?></p>
                    <p><?= htmlspecialchars($pedido['direccion']) ?></p>
                    <p><i class="bx bx-phone"></i> <?= htmlspecialchars($pedido['telefono']) ?></p>
                    <p><i class="bx bx-envelope"></i> <?= htmlspecialchars($pedido['correo']) ?></p>
                </div>
                <div class="detalle-bloque">
                    <h2><i class="bx bx-credit-card"></i> Método de pago</h2>
                    <p><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $pedido['metodo_pago']))) ?></p>
                </div>
                <div class="detalle-bloque estado-bloque">
                    <h2><i class="bx bx-time"></i> Estado del pedido</h2>
                    <div class="estado-steps">
                        <?php
                        $pasos = ['pendiente', 'confirmado', 'enviado', 'entregado'];
                        $idx_actual = array_search($pedido['estado'], $pasos);
                        if ($idx_actual === false) $idx_actual = -1;
                        foreach ($pasos as $i => $paso):
                        ?>
                            <div class="estado-step <?= $i <= $idx_actual ? 'step-activo' : '' ?>">
                                <div class="step-dot"></div>
                                <span><?= $estado_labels[$paso] ?></span>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php include '_footer.php'; ?>

<script>
const ham = document.getElementById('hamburger');
const nav = document.getElementById('navbar');
ham.addEventListener('click', () => { ham.classList.toggle('active'); nav.classList.toggle('open'); });
</script>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}
require_once 'conexion.php';

$usuario_id = (int)$_SESSION['usuario']['id'];
$result = $db->query("SELECT * FROM pedidos WHERE usuario_id = $usuario_id ORDER BY created_at DESC");
$pedidos = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];

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
    'enviado'    => 'Enviado',
    'entregado'  => 'Entregado',
    'cancelado'  => 'Cancelado',
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Pedidos - Kickstart Footwear</title>
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
        <h1 class="pedidos-titulo"><i class="bx bx-list-ul"></i> Mis Pedidos</h1>

        <?php if (empty($pedidos)): ?>
            <div class="carrito-vacio">
                <i class="bx bx-package"></i>
                <p>Aún no tienes pedidos</p>
                <a href="kick.php" class="btn-checkout">Empezar a comprar</a>
            </div>
        <?php else: ?>
            <div class="pedidos-lista">
                <?php foreach ($pedidos as $p): ?>
                    <div class="pedido-card">
                        <div class="pedido-card-header">
                            <div class="pedido-card-num">
                                <span class="label">Pedido</span>
                                <strong>#<?= str_pad($p['id'], 6, '0', STR_PAD_LEFT) ?></strong>
                            </div>
                            <div class="pedido-card-fecha">
                                <span class="label">Fecha</span>
                                <span><?= date('d/m/Y H:i', strtotime($p['created_at'])) ?></span>
                            </div>
                            <div class="pedido-card-metodo">
                                <span class="label">Pago</span>
                                <span><?= htmlspecialchars(ucfirst(str_replace('_', ' ', $p['metodo_pago']))) ?></span>
                            </div>
                            <div class="pedido-card-total">
                                <span class="label">Total</span>
                                <strong>S/. <?= number_format($p['total'], 2) ?></strong>
                            </div>
                            <span class="pedido-badge <?= $estado_clases[$p['estado']] ?? 'badge-pendiente' ?>">
                                <?= $estado_labels[$p['estado']] ?? $p['estado'] ?>
                            </span>
                            <a href="detalle_pedido.php?id=<?= $p['id'] ?>" class="btn-ver-detalle">
                                Ver detalle <i class="bx bx-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
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

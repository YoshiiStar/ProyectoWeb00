<?php
session_start();
require_once 'culqi_config.php';

if (empty($_SESSION['carrito'])) {
    header('Location: carrito.php');
    exit;
}

$total      = 0;
foreach ($_SESSION['carrito'] as $item) {
    $total += $item['precio'] * $item['cantidad'];
}
$envio      = $total >= 300 ? 0 : 15.00;
$gran_total = $total + $envio;

// Culqi: monto en céntimos (soles × 100)
$monto_culqi = (int)round($gran_total * 100);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago - Kickstart Footwear</title>
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
        <?php $cnt = array_sum(array_column($_SESSION['carrito'], 'cantidad')); ?>
        <a href="carrito.php" class="carrito-nav">
            <i class="bx bxs-cart"></i>
            <span class="carrito-badge"><?= $cnt ?></span>
        </a>
    </nav>
</div>

<div class="pago-page">
    <div class="pago-container">
        <h1 class="pago-titulo">Finalizar Pedido</h1>

        <div class="pago-grid">

            <form action="procesar_pago.php" method="POST" class="pago-form" id="form-pago">
<div class="form-section">
                    <h2><i class="bx bx-map"></i> Datos de envío</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="nombre" id="inp-nombre" required
                                value="<?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']['nombres']) : '' ?>">
                        </div>
                        <div class="form-group">
                            <label>Apellido</label>
                            <input type="text" name="apellido" id="inp-apellido" required
                                value="<?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']['apellidos']) : '' ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico</label>
                        <input type="email" name="correo" id="inp-correo" required
                            value="<?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']['correo']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Teléfono</label>
                        <input type="tel" name="telefono" required
                            value="<?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']['telefono']) : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Dirección de entrega</label>
                        <input type="text" name="direccion" required
                            value="<?= isset($_SESSION['usuario']) ? htmlspecialchars($_SESSION['usuario']['direccion']) : '' ?>">
                    </div>
                </div>

                <div class="form-section">
                    <h2><i class="bx bx-credit-card"></i> Método de pago</h2>
                    <div class="metodos-pago">

                        <label class="metodo-option">
                            <input type="radio" name="metodo_pago" value="yape_plin" id="radio-yape" required>
                            <span class="metodo-box">
                                <i class="bx bx-mobile"></i>
                                <strong>Yape / Plin</strong>
                                <small>Escanea y paga</small>
                            </span>
                        </label>

                        <label class="metodo-option">
                            <input type="radio" name="metodo_pago" value="contraentrega">
                            <span class="metodo-box">
                                <i class="bx bx-money"></i>
                                <strong>Contraentrega</strong>
                                <small>Paga al recibir</small>
                            </span>
                        </label>

                        <label class="metodo-option">
                            <input type="radio" name="metodo_pago" value="tarjeta">
                            <span class="metodo-box">
                                <i class="bx bx-credit-card"></i>
                                <strong>Tarjeta</strong>
                                <small>Visa · Mastercard</small>
                            </span>
                        </label>

                    </div>

                    <?php if (isset($_GET['error'])): ?>
                        <div class="pago-error-msg">
                            <i class='bx bx-error-circle'></i>
                            <?= htmlspecialchars($_GET['error']) ?>
                        </div>
                    <?php endif; ?>

                    <!-- Panel QR Yape -->
                    <div id="yape-panel" style="display:none; margin-top:20px;">
                        <div class="yape-qr-box">
                            <div class="yape-qr-izq">
                                <img src="IMG/yape_qr.jpg" alt="QR Yape" class="yape-qr-img">
                            </div>
                            <div class="yape-qr-der">
                                <p class="yape-instruc">Escanea el QR con tu app</p>
                                <div class="yape-apps">
                                    <span class="yape-tag yape-color">Yape</span>
                                    <span class="yape-tag plin-color">Plin</span>
                                </div>
                                <p class="yape-label">Monto a pagar:</p>
                                <p class="yape-monto">S/. <?= number_format($gran_total, 2) ?></p>
                                <p class="yape-nota">Después de pagar, haz clic en<br><strong>"Confirmar Pedido"</strong></p>
                            </div>
                        </div>
                    </div>

                    <!-- Panel Tarjeta -->
                    <div id="tarjeta-panel" style="display:none; margin-top:20px;">
                        <div class="tarjeta-info-box">
                            <div class="tarjeta-logos">
                                <span class="card-tag visa-tag">VISA</span>
                                <span class="card-tag mc-tag">Mastercard</span>
                                <span class="card-tag amex-tag">Amex</span>
                                <span class="card-tag diners-tag">Diners</span>
                            </div>
                            <p class="tarjeta-nota">
                                <i class='bx bxs-lock-alt' style="color:#2e7d32;vertical-align:middle;margin-right:4px;"></i>
                                Al confirmar se abrirá un formulario seguro para ingresar los datos de tu tarjeta. Tu información está cifrada.
                            </p>
                        </div>
                    </div>

                    <input type="hidden" name="culqi_token" id="culqi-token">

                </div>

                <button type="submit" class="btn-pagar" id="btn-pagar">
                    Confirmar Pedido — S/. <?= number_format($gran_total, 2) ?>
                </button>
            </form>

            <div class="pago-resumen">
                <h2>Tu pedido</h2>
                <div class="pedido-items">
                    <?php foreach ($_SESSION['carrito'] as $item): ?>
                        <div class="pedido-item">
                            <img src="<?= htmlspecialchars($item['imagen']) ?>" alt="<?= htmlspecialchars($item['nombre']) ?>">
                            <div class="pedido-item-info">
                                <p><?= htmlspecialchars($item['nombre']) ?></p>
                                <small>x<?= $item['cantidad'] ?></small>
                            </div>
                            <span>S/. <?= number_format($item['precio'] * $item['cantidad'], 2) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="resumen-linea"><span>Subtotal</span><span>S/. <?= number_format($total, 2) ?></span></div>
                <div class="resumen-linea">
                    <span>Envío</span>
                    <span><?= $envio == 0 ? '<span class="envio-gratis">Gratis</span>' : 'S/. ' . number_format($envio, 2) ?></span>
                </div>
                <div class="resumen-total"><span>Total</span><span>S/. <?= number_format($gran_total, 2) ?></span></div>
                <a href="carrito.php" class="btn-seguir">← Editar carrito</a>
            </div>

        </div>
    </div>
</div>

<?php include '_footer.php'; ?>

<script src="https://checkout.culqi.com/js/v4"></script>
<script>
// ── Navbar ──
const ham = document.getElementById('hamburger');
const nav = document.getElementById('navbar');
ham.addEventListener('click', () => { ham.classList.toggle('active'); nav.classList.toggle('open'); });

// ── Mostrar/ocultar paneles de pago ──
document.querySelectorAll('input[name="metodo_pago"]').forEach(function(radio) {
    radio.addEventListener('change', function() {
        document.getElementById('yape-panel').style.display    = 'none';
        document.getElementById('tarjeta-panel').style.display = 'none';

        if (this.value === 'yape_plin') {
            const p = document.getElementById('yape-panel');
            p.style.display = 'block';
            p.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        } else if (this.value === 'tarjeta') {
            const p = document.getElementById('tarjeta-panel');
            p.style.display = 'block';
            p.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }
    });
});

// ── Culqi: configuración ──
Culqi.publicKey = '<?= CULQI_PUBLIC_KEY ?>';
Culqi.settings({
    title      : 'Kickstart Footwear',
    currency   : 'PEN',
    description: 'Pedido Kickstart Footwear',
    amount     : <?= $monto_culqi ?>
});

// Culqi llama a window.culqi() al obtener el token o al cerrar
window.culqi = function() {
    if (Culqi.token) {
        document.getElementById('culqi-token').value = Culqi.token.id;
        Culqi.close();
        document.getElementById('form-pago').submit();
    } else if (Culqi.error) {
        alert(Culqi.error.user_message || 'Error al procesar la tarjeta.');
    }
};

// ── Interceptar envío del formulario para tarjeta ──
document.getElementById('form-pago').addEventListener('submit', function(e) {
    var metodo = document.querySelector('input[name="metodo_pago"]:checked');
    if (metodo && metodo.value === 'tarjeta') {
        e.preventDefault();
        if (!this.checkValidity()) {
            this.reportValidity();
            return;
        }
        Culqi.open();
    }
});
</script>
</body>
</html>

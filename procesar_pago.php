<?php
session_start();
require_once 'conexion.php';
require_once 'culqi_config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_SESSION['carrito'])) {
    header('Location: carrito.php');
    exit;
}

$nombre       = trim($_POST['nombre'] ?? '');
$apellido     = trim($_POST['apellido'] ?? '');
$correo       = trim($_POST['correo'] ?? '');
$telefono     = trim($_POST['telefono'] ?? '');
$direccion    = trim($_POST['direccion'] ?? '');
$metodo_pago  = trim($_POST['metodo_pago'] ?? '');
$culqi_token  = trim($_POST['culqi_token'] ?? '');

// Calcular totales primero (necesario para el cobro Culqi)
$subtotal = 0;
foreach ($_SESSION['carrito'] as $item) {
    $subtotal += $item['precio'] * $item['cantidad'];
}
$envio      = $subtotal >= 300 ? 0 : 15.00;
$gran_total = $subtotal + $envio;

// Si es pago con tarjeta, cobrar via Culqi API
if ($metodo_pago === 'tarjeta') {
    if ($culqi_token === '') {
        header('Location: pago.php?error=' . urlencode('No se recibió el token de tarjeta. Intenta de nuevo.'));
        exit;
    }

    $monto_centimos = (int)round($gran_total * 100);

    $payload = json_encode([
        'amount'        => $monto_centimos,
        'currency_code' => 'PEN',
        'email'         => $correo,
        'source_id'     => $culqi_token,
    ]);

    $ch = curl_init('https://api.culqi.com/v2/charges');
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_POSTFIELDS     => $payload,
        CURLOPT_HTTPHEADER     => [
            'Authorization: Bearer ' . CULQI_SECRET_KEY,
            'Content-Type: application/json',
        ],
    ]);
    $response  = curl_exec($ch);
    curl_close($ch);
    $culqi_res = json_decode($response, true);

    if (!isset($culqi_res['id']) || ($culqi_res['object'] ?? '') !== 'charge') {
        $msg = $culqi_res['user_message'] ?? 'Error al procesar el pago con tarjeta.';
        header('Location: pago.php?error=' . urlencode($msg));
        exit;
    }
}

$nombre_completo = $nombre . ' ' . $apellido;
$usuario_id      = isset($_SESSION['usuario']['id']) ? (int)$_SESSION['usuario']['id'] : 0;

$stmt = $db->prepare(
    "INSERT INTO pedidos (usuario_id, nombre_cliente, correo, telefono, direccion, metodo_pago, subtotal, envio, total)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
);
$stmt->bind_param("isssssddd", $usuario_id, $nombre_completo, $correo, $telefono, $direccion, $metodo_pago, $subtotal, $envio, $gran_total);
$stmt->execute();
$pedido_id = $stmt->insert_id;
$stmt->close();

$stmt2 = $db->prepare(
    "INSERT INTO pedido_detalles (pedido_id, producto_id, nombre_producto, precio_unitario, cantidad)
     VALUES (?, ?, ?, ?, ?)"
);
foreach ($_SESSION['carrito'] as $id => $item) {
    $pid = (int)$id;
    $stmt2->bind_param("iisdi", $pedido_id, $pid, $item['nombre'], $item['precio'], $item['cantidad']);
    $stmt2->execute();
}
$stmt2->close();

unset($_SESSION['carrito']);
$_SESSION['ultimo_pedido'] = $pedido_id;

header('Location: pedido_confirmado.php');
exit;

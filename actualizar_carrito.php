<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id     = (int)($_POST['id'] ?? 0);
    $accion = $_POST['accion'] ?? '';

    if ($accion === 'eliminar') {
        unset($_SESSION['carrito'][$id]);
    } elseif ($accion === 'incrementar' && isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']++;
    } elseif ($accion === 'decrementar' && isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']--;
        if ($_SESSION['carrito'][$id]['cantidad'] <= 0) {
            unset($_SESSION['carrito'][$id]);
        }
    }
}

header('Location: carrito.php');
exit;

<?php
session_start();
require_once 'productos_data.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)($_POST['id'] ?? 0);
    $redirect = $_POST['redirect'] ?? 'kick.php';

    // Solo rutas locales simples
    if (!preg_match('/^[a-zA-Z0-9_\-]+\.php$/', $redirect)) {
        $redirect = 'kick.php';
    }

    if (isset($PRODUCTOS[$id])) {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
        if (isset($_SESSION['carrito'][$id])) {
            $_SESSION['carrito'][$id]['cantidad']++;
        } else {
            $p = $PRODUCTOS[$id];
            $_SESSION['carrito'][$id] = [
                'id'      => $p['id'],
                'nombre'  => $p['nombre'],
                'desc'    => $p['desc'],
                'precio'  => $p['precio'],
                'imagen'  => $p['imagen'],
                'cantidad'=> 1,
            ];
        }
    }
    header('Location: ' . $redirect);
    exit;
}

header('Location: kick.php');
exit;

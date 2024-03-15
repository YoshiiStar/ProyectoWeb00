<?php
require_once 'conexion.php';

$username   = trim($_POST['username']);
$contraseña = $_POST['password'];

$stmt = $db->prepare("SELECT * FROM usuarios WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    $hashOk  = password_verify($contraseña, $row['contraseña']);
    $plainOk = !$hashOk && ($contraseña === $row['contraseña']);

    if ($hashOk || $plainOk) {
        if ($plainOk) {
            // Migrar contraseña de texto plano a hash
            $nuevoHash = password_hash($contraseña, PASSWORD_DEFAULT);
            $upd = $db->prepare("UPDATE usuarios SET contraseña = ? WHERE username = ?");
            $upd->bind_param("ss", $nuevoHash, $username);
            $upd->execute();
            $upd->close();
        }
        $_SESSION['usuario'] = $row;
        header("Location: kick.php");
        exit();
    }
}

$_SESSION['login'] = true;
header("Location: login.php");
exit();

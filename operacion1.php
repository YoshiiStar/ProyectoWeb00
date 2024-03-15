<?php
require_once 'conexion.php';

$username   = trim($_POST['username']);
$nombres    = trim($_POST['nombres']);
$apellidos  = trim($_POST['apellidos']);
$dni        = trim($_POST['dni']);
$correo     = trim($_POST['correo']);
$telefono   = trim($_POST['telefono']);
$direccion  = trim($_POST['direccion']);
$contraseña = password_hash($_POST['password'], PASSWORD_DEFAULT);

$stmt = $db->prepare("INSERT INTO usuarios (username, nombres, apellidos, dni, correo, telefono, direccion, contraseña) VALUES (?,?,?,?,?,?,?,?)");
$stmt->bind_param("ssssssss", $username, $nombres, $apellidos, $dni, $correo, $telefono, $direccion, $contraseña);

if ($stmt->execute()) {
    $_SESSION['registro'] = true;
} else {
    echo "Error al registrar: " . $stmt->error;
    exit();
}

$stmt->close();
mysqli_close($db);

header("Location: login.php");
exit();

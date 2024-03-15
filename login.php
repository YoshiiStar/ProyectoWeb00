<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión | Kickstart Footwear</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
    <link rel="icon" href="IMG/icon/nike.icon.jpg">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="auth-layout">

    <!-- Panel izquierdo: branding -->
    <div class="auth-brand">
        <a href="kick.php" class="brand-logo-link">
            <img src="kickseyy.png" alt="Kickstart Footwear" class="brand-logo">
        </a>
        <h2 class="brand-tagline">Tu estilo,<br>tu identidad.</h2>
        <p class="brand-sub">Las mejores marcas de sneakers en un solo lugar.</p>
    </div>

    <!-- Panel derecho: formulario -->
    <div class="auth-panel">
        <div class="auth-form-wrap">

            <a href="kick.php" class="back-link">
                <i class="bx bx-arrow-back"></i> Volver al inicio
            </a>

            <h1 class="auth-title">Iniciar Sesión</h1>
            <p class="auth-sub">Bienvenido de vuelta</p>

            <?php if (isset($_SESSION['login']) && $_SESSION['login']): ?>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({ icon:'error', title:'Credenciales incorrectas',
                        text:'Verifica tu usuario y contraseña.', confirmButtonColor:'#101010' });
                });
            </script>
            <?php unset($_SESSION['login']); ?>
            <?php endif; ?>

            <?php if (isset($_SESSION['registro']) && $_SESSION['registro']): ?>
            <script>
                document.addEventListener('DOMContentLoaded', () => {
                    Swal.fire({ icon:'success', title:'¡Registro exitoso!',
                        text:'Ya puedes iniciar sesión.', confirmButtonColor:'#101010' });
                });
            </script>
            <?php unset($_SESSION['registro']); ?>
            <?php endif; ?>

            <form action="operacion2.php" method="POST" class="auth-form">

                <div class="input-group">
                    <i class="bx bx-user input-icon"></i>
                    <input type="text" id="username" name="username"
                           placeholder="Usuario" required autocomplete="username">
                </div>

                <div class="input-group">
                    <i class="bx bx-lock-alt input-icon"></i>
                    <input type="password" id="password" name="password"
                           placeholder="Contraseña" required autocomplete="current-password">
                    <button type="button" class="toggle-pass" id="togglePass" aria-label="Mostrar contraseña">
                        <i class="bx bx-hide" id="toggleIcon"></i>
                    </button>
                </div>

                <div class="form-extras">
                    <span class="recordar">¿Olvidaste tu contraseña?</span>
                </div>

                <button type="submit" class="btn-auth">Iniciar Sesión</button>

                <p class="auth-switch">¿No tienes cuenta? <a href="registrar.php">Regístrate aquí</a></p>
            </form>

        </div>
    </div>

</div>

<script>
    const toggle = document.getElementById('togglePass');
    const input  = document.getElementById('password');
    const icon   = document.getElementById('toggleIcon');
    toggle.addEventListener('click', () => {
        const isPass = input.type === 'password';
        input.type   = isPass ? 'text' : 'password';
        icon.className = isPass ? 'bx bx-show' : 'bx bx-hide';
    });
</script>

</body>
</html>

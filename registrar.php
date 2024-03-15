<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta | Kickstart Footwear</title>
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="registrar.css">
    <link rel="icon" href="IMG/icon/nike.icon.jpg">
</head>
<body>

<div class="auth-layout">

    <!-- Panel izquierdo: branding -->
    <div class="auth-brand">
        <a href="kick.php" class="brand-logo-link">
            <img src="kickseyy.png" alt="Kickstart Footwear" class="brand-logo">
        </a>
        <h2 class="brand-tagline">Únete a<br>Kickstart.</h2>
        <p class="brand-sub">Crea tu cuenta y accede a los mejores sneakers del mercado.</p>
    </div>

    <!-- Panel derecho: formulario -->
    <div class="auth-panel">
        <div class="auth-form-wrap">

            <a href="login.php" class="back-link">
                <i class="bx bx-arrow-back"></i> Ya tengo cuenta
            </a>

            <h1 class="auth-title">Crear Cuenta</h1>
            <p class="auth-sub">Completa tus datos para registrarte</p>

            <form action="operacion1.php" method="POST" class="auth-form">

                <div class="form-row">
                    <div class="input-group">
                        <i class="bx bx-user input-icon"></i>
                        <input type="text" name="nombres" placeholder="Nombre" required>
                    </div>
                    <div class="input-group">
                        <i class="bx bx-user input-icon"></i>
                        <input type="text" name="apellidos" placeholder="Apellido" required>
                    </div>
                </div>

                <div class="input-group">
                    <i class="bx bx-id-card input-icon"></i>
                    <input type="text" name="username" placeholder="Nombre de usuario" required>
                </div>

                <div class="form-row">
                    <div class="input-group">
                        <i class="bx bx-card input-icon"></i>
                        <input type="text" name="dni" placeholder="DNI (8 dígitos)"
                               maxlength="8" pattern="\d{8}" title="DNI debe tener 8 dígitos" required>
                    </div>
                    <div class="input-group">
                        <i class="bx bx-phone input-icon"></i>
                        <input type="text" name="telefono" placeholder="Teléfono (9 dígitos)"
                               maxlength="9" pattern="\d{9}" title="Teléfono debe tener 9 dígitos" required>
                    </div>
                </div>

                <div class="input-group">
                    <i class="bx bx-envelope input-icon"></i>
                    <input type="email" name="correo" placeholder="Correo electrónico" required>
                </div>

                <div class="input-group">
                    <i class="bx bx-map input-icon"></i>
                    <input type="text" name="direccion" placeholder="Dirección" required>
                </div>

                <div class="input-group">
                    <i class="bx bx-lock-alt input-icon"></i>
                    <input type="password" id="password" name="password"
                           placeholder="Contraseña" required autocomplete="new-password">
                    <button type="button" class="toggle-pass" id="togglePass" aria-label="Mostrar contraseña">
                        <i class="bx bx-hide" id="toggleIcon"></i>
                    </button>
                </div>

                <button type="submit" class="btn-auth">Crear Cuenta</button>

                <p class="auth-switch">¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a></p>
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

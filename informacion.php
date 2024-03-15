<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Información</title>
        <link rel="stylesheet" href="styleList.css"/>
        <link rel="stylesheet" href="información.css">
    </head>
    <body>
        <div class="head">

            <div class="logo">            
                <a href="#"><img src="kickseyy.png" alt=""></a>
            </div>          

            <nav class="navbar">
                <a href="kick.php">Inicio</a>
                <a href="hombre.php">Hombre</a>
                <a href="mujeres.php">Mujer</a> 
                <a href="#">Nuevo</a>
                <a href="informacion.php">Informacion</a>
                <?php if (isset($_SESSION['usuario'])): ?>
                    <div class="menu-list">
                        <a href="#" class="dropbtn opcion"><?= $_SESSION['usuario']['nombres'] ?></a>
                        <div class="menu-list secret-list">
                            <a href="logout.php">Cerrar Sesión</a>
                        </div>
                    </div>
                <?php else: ?>
                    <a href="login.php" class="dropbtn ban">Iniciar Sesión</a>
                <?php endif; ?>
            </nav>

        </div>


        <div class="content">
            <h1>Sobre Nosotros</h1>
            <br>
            <fieldset>
                <legend><b>¿Quienes somos?</b></legend>
                <p>Somos una empresa de comercialización de calzado para hombres y mujeres.<br>
                    Nos enfocamos en brindar una experiencia de compra agradable y personalizada<br>
                    a nuestros clientes, ofreciendo productos de alta calidad, diseño innovador<br>
                    y a precios accesibles.</p>
            </fieldset>
            <br>
            <fieldset>
                <legend><b>Visión</b></legend>
                <p>Nuestra visión es ser la empresa líder en el mercado, ampliando nuestra<br>
                    gama de servicios. Aspiramos a convertirnos en el destino preferido<br>
                    para los amantes de las zapatillas, ofreciendo productos de primera<br>
                    calidad, un servicio excepcional.</p>
            </fieldset>
            <br>
            <fieldset>
                <legend><b>Misión</b></legend>
                <p>Nuestra misión es ofrecer a nuestros clientes una experiencia de compra<br>
                    excepcional, brindando productos de moda de alta calidad, diseño<br>
                    vanguardista y a precios asequibles, fomentando un estilo de vida activo.</p>
            </fieldset>
        </div>
    </body>
</html>

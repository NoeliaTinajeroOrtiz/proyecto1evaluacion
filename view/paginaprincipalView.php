<?php

include ('AllProductsView.php');
include ('AllServicesView.php');

?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>

    <meta charset="UTF-8">
    <meta name="description" content="Este es un ejemplo crud">
    <meta name="keywords" content="html, css, bootstrap, js, portfolio, proyectos, php">
    <meta name="language" content="EN">
    <meta name="author" content="noelia.tinajero@a.vedrunasevillasj.es">
    <meta name="robots" content="index,follow">
    <meta name="revised" content="Tuesday, February 28th, 2023, 23:00pm">
    <meta name="viewport" content="width=device-width, initial scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE-edge, chrome1">

    <!-- Añado la fuente Roboto -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"
        defer></script>

    <!-- Titulo -->
    <title>Tienda de informática</title>
    <link rel="stylesheet" type="text/css" href="../estilos.css" />

</head>

<body>

    <?php
    if (isset ($_SESSION["usuario"])){
        ?>
    <h3>Bienvenido <?= $_SESSION['usuario']['nombre']?></h3>
    <a href="logout.php">Logout</a>
    <?php
    }else {

        ?>
    <header>Bienvenidos a la página principal.</header>
    <div>
        Si ya está registrado pincha aquí: <a href="formulario_login.php">Login</a>
    </div>
    <div>
        Si aun no está registrado, pincha aquí: <a href="registro.php">Registro</a>
    </div>
    <?php
    }
    ?>
    <nav>
        <ul>
            <li><a href="paginaprincipalView.php">Inicio</a></li>
            <li>
                <a href="AllProductsView.php">Productos</a>
                <ul>
                    <li><a href="PartesdelOrdenadorView.php">Partes del ordenador</a></li>
                    <li><a href="PerifericosView.php">Periféricos</a></li>
                    <li><a href="TeclasView.php">Teclas</a></li>
                </ul>
            </li>
            <li>
                <a href="AllServicesView.php">Servicios</a>
                <ul>
                    <li><a href="DiseñarWebView.php">Diseñar una web</a></li>
                    <li><a href="ComprobaryMejorarView.php">Comprobar y mejorar tu rendimiento</a></li>
                    <li><a href="InstalarView.php">Instalar drivers y programas</a></li>
                    <li><a href="ReparacionView.php">Reparación de pc</a></li>
                    <li><a href="SolucionarErroresView.php">Solución de errores</a></li>
                    <li><a href="MantenimientoView.php">Mantenimiento de tu web</a></li>
                </ul>
            </li>
            <li><a href="ContactoView.php">Contacto</a></li>
            <li><a href="CestaView.php">Cesta</a></li>
        </ul>
    </nav>
</body>

</html>
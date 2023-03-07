<?php
if (!isset($_SESSION)) {
    session_start();
}
$autentificado = $_SESSION["login"] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="shortcut icon" href="https://img.icons8.com/plasticine/100/null/home-page.png">
    <link rel="stylesheet" href="./build/css/app.css">
    <link rel="stylesheet" href="../build/css/app.css">
    
</head>

<body>
    <header class="header  <?php echo $inicio ? 'inicio' : ''; ?> ">
        <div class="contenedor contenido-header">
            <div class=" barra">
                <a href="./">
                    <img src="/bienesraices_inicio/build/img/logo.svg" alt="logo">
                </a>
                <div class="mobile-menu">
                    <img src="/bienesraices_inicio/build/img/barras.svg" alt="icono menu">
                </div>
                <div class="derecha">
                    <img src="/bienesraices_inicio/build/img/dark-mode.svg" class="dark-mode-boton" alt="dark mode">
                    <nav class="navegacion">
                        <a href="./nosotros">Nosotros</a>
                        <a href="./propiedades">Anuncios</a>
                        <a href="./blog">Blog</a>
                        <a href="./contacto">Contacto</a>
                        <?php if ($autentificado) { ?>
                            <a href="./admin">Administrar</a>
                            <a href="./logout">Cerrar Sesion</a>
                        <?php } ?>
                    </nav>

                </div>

            </div>
            <?php if ($inicio) { ?>
                <h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>
            <?php  } ?>

        </div>

    </header>

    <?php
    echo $contenido;
    ?>

    <footer class="footer seccion">
        <div class="contenedor contenido-footer">
            <nav class=" navegacion">
                <a href="./nosotros">Nosotros</a>
                <a href="./propiedades">Anuncios</a>
                <a href="./blog">Blog</a>
                <a href="./contacto">Contacto</a>
            </nav>
        </div>
        <p class="copyright">Todos los derechos Reservados <?php echo date("Y"); ?> &copy;</p>

    </footer>
    <script src="./build/js/bundle.min.js"></script>
</body>

</html>
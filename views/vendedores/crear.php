<main class="contenedor seccion ">
    <h1>Registrar Nuevo Vendedor</h1>
    <div>
        <a href="../admin" class="boton-verde"> volver</a>
    </div>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="formulario" method="POST">
        <?php include __DIR__ . "./formulario.php" ?>
        <input type="submit" value="Registrar Vendedor" class="boton-verde">

    </form>

</main>
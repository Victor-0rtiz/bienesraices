<main class="contenedor seccion ">
    <h1> Actualizar Vendedor</h1>
    <div>
        <a href="../admin" class="boton-verde"> volver</a>
    </div>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include __DIR__ . "./formulario.php" ?>
        <input type="submit" value="Actualizar vendedor" class="boton-verde">

    </form>

</main>
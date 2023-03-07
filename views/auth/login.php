<main class="contenedor seccion">
    <h1> Login de Usuario</h1>
    <?php foreach ($errores as $error) { ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php } ?>
    <form class="formulario" method="POST">
        <fieldset>
            <legend>Correo y Contraseña</legend>
            <label for="email"> Tu Correo</label>
            <input type="email" name="email" placeholder="Tu Correo" id="email">

            <label for="password"> Tu Contraseña</label>
            <input type="password" name="password" placeholder="Tu Contraseña " id="password">
        </fieldset>
        <input type="submit" class="boton boton-verde" value="Iniciar Sesión">
    </form>
</main>
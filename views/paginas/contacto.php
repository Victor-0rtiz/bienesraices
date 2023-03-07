<main class="contenedor">
    <h1>Contacto</h1>
    <?php if ($mensaje) { ?>
        <p class="alerta exito">Enviado Correctamente</p>
    <?php } ?>
    <picture>
        <source srcset="build/img/destacada3.webp" type="img/webp">
        <source srcset="build/img/destacada3.jpg" type="img/jpeg">
        <img src="build/img/destacada3.webp" alt="Imagen contacto">
    </picture>
    <h2>Llene el formulario de Contacto</h2>
    <form class="formulario" method="POST">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Tu Nombre:</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre aqui" required>

            <label for="mensaje">Tu Mensaje:</label>
            <textarea name="mensaje" id="mensaje" required></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion sobre la propiedad</legend>

            <label for="opciones">Vende o Compra:</label>
            <select id="opciones" name="tipo" required>
                <option value="" disabled selected>--Seleccione--</option>
                <option value="comprar">Compra</option>
                <option value="vende">Vende</option>
            </select>

            <label for="presupuesto"> Precio o Presupuesto</label>
            <input type="number" id="presupuesto" name="presupuesto" required>

        </fieldset>
        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado</p>
            <div class="forma-contacto">
                <label for="contactar-telefono">Telefono</label>
                <input name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                <label for="contactar-email">E-mail</label>
                <input name="contacto" type="radio" value="email" id="contactar-email" required>

            </div>
            <div class="forma_contacto"></div>


        </fieldset>
        <input type="submit" value="Enviar" class="boton-verde">
    </form>

</main>
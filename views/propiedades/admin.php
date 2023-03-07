<?php

?>
<main class="contenedor seccion">
    <h1>inicio</h1>
    <?php if ($resultado == 1) { ?>
        <p class="alerta exito">Creada Correctamente </p>
    <?php } elseif ($resultado == 2) { ?>
        <p class="alerta exito">Actualizada Correctamente </p>
    <?php } elseif ($resultado == 3) { ?>
        <p class="alerta exito">Eliminada Correctamente </p>
    <?php } ?>
    <div>
        <a href="propiedades/crear" class="boton-verde"> Crear Propiedad</a>
        <a href="vendedores/crear" class="boton-amarillo_block"> Crear Vendedor</a>
    </div>
    <h2> Propiedades </h2>

    <table class="tabla-propiedades">
        <thead>
            <th>Id</th>
            <th>Titulo</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($propiedad as $propiedades) {
                 ?>
                <tr>
                    <td><?php echo $propiedades->id; ?></td>
                    <td><?php echo $propiedades->titulo; ?></td>
                    <td><img src="./imagenes/<?php echo $propiedades->imagen; ?>" class="imagen-tabla" alt="imagen propiedad"></td>
                    <td>$ <?php echo $propiedades->precio; ?></td>
                    <td>
                        <a href="./propiedades/actualizar?id=<?php echo $propiedades->id; ?>" class="boton boton-amarillo">Actualizar</a>
                        <form method="POST" action="./propiedades/eliminar">

                            <input type="hidden" name="id" value="<?php echo $propiedades->id; ?>">
                            <input type="hidden" name="tipo" value="propiedad">
                            <input type="submit" value="Borrar" class="boton-rojo_block">

                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <h2> Vendedores </h2>

    <table class="tabla-propiedades">
        <thead>
            <th>Id</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            <?php foreach ($vendedores as $vendedor) { ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td><?php echo $vendedor->telefono; ?></td>
                    <td>
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton boton-amarillo">Actualizar</a>
                        <form method="POST" action="./propiedades/eliminar">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" value="Borrar" class="boton-rojo_block">

                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</main>


<?php




?>
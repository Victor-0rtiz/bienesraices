
<div class="contenedor-anuncios">
    <?php foreach ($propiedades as $propiedad) {  ?>
        <div class="anuncios">


            <img src="/bienesraices_inicio/imagenes/<?php echo $propiedad->imagen; ?>" alt="anuncio1">

            <div class="contenido-anuncio">
                <h3><?php echo $propiedad->titulo; ?></h3>
                <p><?php echo substr($propiedad->descripcion, 0, 100) . " ..."; ?></p>
                <p class="precio">$ <?php echo number_format($propiedad->precio); ?></p>
                <ul class="iconos-caracteristicas">
                    <li>
                        <img src="build/img/icono_wc.svg" class="iconos" alt="baños">
                        <p><?php echo $propiedad->baños; ?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_estacionamiento.svg" class="iconos" alt="estacionamiento">
                        <p><?php echo $propiedad->estacionamientos; ?></p>
                    </li>
                    <li>
                        <img src="build/img/icono_dormitorio.svg" class="iconos" alt="dormitorios">
                        <p><?php echo $propiedad->baños; ?></p>
                    </li>
                </ul>
                <a href="./propiedad?id=<?php echo $propiedad->id ?>" class="boton boton-amarillo"> Ver Propiedad</a>
            </div>
        </div><!-- anuncio -->
    <?php } ?>



</div> <!-- contenedor anuncio -->
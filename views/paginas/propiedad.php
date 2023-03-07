<main class="contenedor seccion">
    <h1><?php echo $propiedad->titulo; ?></h1>
    
      
        <img src="imagenes/<?php echo $propiedad->imagen; ?>" alt="imagen">
    
    <div class="resumen-propiedad">
        <p class="precio">$<?php echo number_format($propiedad->precio); ?></p>
        <ul class="iconos-caracteristicas">
            <li>
                <img class="iconos" src="build/img/icono_wc.svg" alt="baños">
                <p><?php echo $propiedad->baños; ?></p>
            </li>
            <li>
                <img class="iconos" src="build/img/icono_estacionamiento.svg" alt="estacionamiento">
                <p><?php echo $propiedad->estacionamientos; ?></p>
            </li>
            <li>
                <img class="iconos" src="build/img/icono_dormitorio.svg" alt="dormitorios">
                <p><?php echo $propiedad->habitaciones; ?></p>
            </li>
        </ul>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis aliquid quaerat deleniti inventore
            quidem pariatur maiores error iure eius aspernatur deserunt optio reprehenderit, dignissimos porro
            soluta odio provident eaque tenetur. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus,
            rem voluptate fugit hic vero, nostrum reprehenderit nemo modi odit beatae deserunt facere nam
            exercitationem repellat, ea laudantium unde eos consequuntur?</p>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor id ab eius deserunt itaque perferendis
            accusantium voluptate, molestiae possimus. Culpa quasi aspernatur architecto obcaecati quae possimus
            veniam quod dolorum tenetur.
        </p>

    </div>

</main>
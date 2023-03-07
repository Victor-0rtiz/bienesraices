<main class="contenedor">
    <h1>Más Sobre Nosotros</h1>
    <div class="iconos-nosotros">
        <div class="icono">
            <img src="build/img/icono1.svg" alt="icono seguridad">
            <h3>Seguridad</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quas quos minus autem? Dolorum
                reprehenderit voluptas tempora animi doloribus nihil voluptatum. Perspiciatis libero quae quasi
                fugiat. Iure cupiditate soluta odit.</p>

        </div>
        <div class="icono">
            <img src="build/img/icono2.svg" alt="icono seguridad">
            <h3>Precio</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quas quos minus autem? Dolorum
                reprehenderit voluptas tempora animi doloribus nihil voluptatum. Perspiciatis libero quae quasi
                fugiat. Iure cupiditate soluta odit.</p>

        </div>
        <div class="icono">
            <img src="build/img/icono3.svg" alt="icono seguridad">
            <h3>A Tiempo</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi quas quos minus autem? Dolorum
                reprehenderit voluptas tempora animi doloribus nihil voluptatum. Perspiciatis libero quae quasi
                fugiat. Iure cupiditate soluta odit.</p>

        </div>

    </div>

</main>
<section class="seccion contenedor">
    <h2>Casas y Departamentos en Venta</h2>
    <!-- anuncio -->
    <?php
    include "listado.php"; ?>

    <div class="alineado-derecha">
        <a href="anuncios.php" class="boton-verde alineado-derecha"> Ver Todas </a>
    </div>
</section>
<section class="imagen-contacto">
    <h2>Encuentra la casa de tus sueños</h2>


    <p>Llena el formulario y un asesor se pondra en contacto contigo a la brevedad</p>



    <a href="./contacto" class=" boton-amarillo_block"> Contactános</a>



</section>
<div class="contenedor seccion seccion-inferior">
    <section class="blog">
        <h3>Nuestro Blog</h3>
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog1.webp" type="img/webp">
                    <source srcset="build/img/blog1.jpg" type="img/jpeg">
                    <img src="build/img/blog1.jpg" alt="imagen blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>
                        Consejos para construir una terraza en el techo de tu casa con los mejores materiales y
                        ahorrando dinero
                    </p>
                </a>
            </div>
        </article>
        <!-- fin articulo 1 -->
        <article class="entrada-blog">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/blog2.webp" type="img/webp">
                    <source srcset="build/img/blog2.jpg" type="img/jpeg">
                    <img src="build/img/blog2.jpg" alt="imagen blog">
                </picture>
            </div>
            <div class="texto-entrada">
                <a href="entrada">
                    <h4>Guiá para la decoración de tu hogar</h4>
                    <p class="informacion-meta">Escrito el: <span>20/10/2022</span> por: <span>Admin</span></p>
                    <p>
                        Maximiza el espacio en tu hogar con esa guía, aprende a combinar muebles y colores para
                        darle vida a tu espacio
                    </p>
                </a>
            </div>
        </article>
        <!-- fin articulo 2 -->
    </section>
    <section>
        <h3>Testimoniales</h3>
        <div class="testimonial">
            <blockquote>
                El personal se comportó de una excelente formna, muy buena atención y la clasa que me ofrecieron
                cumple con todas mis expectativas
            </blockquote>
            <p>- Desconocido </p>
        </div>
    </section>

</div>
<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadControllers
{
    public static function index(Router $router)
    {
        $propiedad = Propiedad::all();
        $vendedores = Vendedores::all();
        $resultado = $_GET["resultado"];
        $router->render("propiedades/admin", ["propiedad" => $propiedad, "vendedores" => $vendedores, "resultado" => $resultado]);
    }

    public static function crear(Router $router)
    {
        $propiedad = new Propiedad;
        $vendedores = Vendedores::all();
        $errores = Propiedad::mostrarErrores();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $propiedad = new Propiedad($_POST); //creamos una instancia 

            $imagen = $_FILES["imagen"];
            //asignamos esto para que al crear un nombre la imagen tenga la misma extension

            // $carpetaImagenes = "../../imagenes/";

            $nombreImagen = uniqid(rand()) . $imagen["name"];  //esto le cambia el nombre


            if ($_FILES["imagen"]["tmp_name"]) { //verificamos si existe una imagen para guardar una

                $image = Image::make($_FILES["imagen"]["tmp_name"])->fit(800, 600); //make toma la imagen que se esta subiendo del $_files y crea una nueva
                $propiedad->setImagen($nombreImagen);  //aqui le damos a la propiedad el nombre de la imagen 

            }


            $errores = $propiedad->validar(); //aqui al mandar el formulario valida y muestra los errores.


            if (empty($errores)) { //empty valida si errores esta vacio


                if (!is_dir(RUTA_IMAGENES)) {  //crear carpeta donde se subira al server la imagen
                    mkdir(RUTA_IMAGENES);
                }
                if ($_FILES["imagen"]["tmp_name"]) {

                    $image->save(RUTA_IMAGENES . $nombreImagen);
                }

                $resultado = $propiedad->guardarDatos();

                if ($resultado) {
                    header("Location: /bienesraicesMVC/admin?resultado=1");
                }
            }
        }
        $router->render("propiedades/crear", ["propiedad" => $propiedad, "vendedores" => $vendedores, "errores" => $errores]);
    }

    public static function actualizar(Router $router)
    {
        $id = validarId("../admin");
        $propiedad = Propiedad::buscar($id);
        $errores = Propiedad::mostrarErrores();
        $vendedores = Vendedores::all();
        if ($_SERVER["REQUEST_METHOD"] === "POST") { // con este codigo se valida un formulario

            $propiedad->sincronizar($_POST);

            $imagen = $_FILES["imagen"];

            // if (!$imagen["name"] || $imagen["error"]) {
            //     $errores[] = "Debes añadir una foto";
            // }
            $errores = $propiedad->validar();
            $nombreImagen = uniqid(rand()) . $imagen["name"];


            if ($_FILES["imagen"]["tmp_name"]) { //verificamos si existe una imagen para guardar una

                $image = Image::make($_FILES["imagen"]["tmp_name"])->fit(800, 600); //make toma la imagen que se esta subiendo del $_files y crea una nueva
                $propiedad->setImagen($nombreImagen);  //aqui le damos a la propiedad el nombre de la imagen 
                $image->save(RUTA_IMAGENES . $nombreImagen);
                // debuger($_FILES);
            }

            if (empty($errores)) { //empty valida si errores esta vacio
                $resultado = $propiedad->actualizar();

                if ($resultado) {
                    header("Location: /bienesraicesMVC/admin?resultado=2");
                }
            }
        }
        $router->render("propiedades/actualizar", ["propiedad" => $propiedad, "vendedores" => $vendedores, "errores" => $errores]);
    }

    public static function eliminar( Router $router)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST"){


            $id = $_POST["id"]; //traemos el id de la misma pagina por medio del method post
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                
                $tipo = $_POST["tipo"];
                if (verificarTipo($tipo)) {
                    if ($tipo == "vendedor") {
                        $vendedores = Vendedores::buscar($id);
                        $resultadoEliminar = $vendedores->eliminar();
                    } else if ($tipo == "propiedad") {
                        $propiedad = Propiedad::buscar($id);
                        $resultadoEliminar = $propiedad->eliminar();
                        
                    }
                    if ($resultadoEliminar) {
                        header("location: ../admin?resultado=3");
                    }
                }

                
            }
        }
    }
}

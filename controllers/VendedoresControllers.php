<?php

namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;

class VendedoresControllers
{
    public static function crear(Router $router)
    {
        $vendedor = new Vendedores;
        $errores = Vendedores::mostrarErrores();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $vendedor = new Vendedores($_POST); //creamos una instancia 

            $errores = $vendedor->validar(); //aqui al mandar el formulario valida y muestra los errores.


            if (empty($errores)) { //empty valida si errores esta vacio


                $resultado = $vendedor->guardarDatos();

                if ($resultado) {
                    header("Location: /bienesraicesMVC/admin?resultado=1");
                }
            }
        }
        $router->render("vendedores/crear", ["vendedor" => $vendedor, "errores" => $errores]);
    }
    public static function actualizar(Router $router)
    {
        $id = validarId("../admin");
        $vendedor = Vendedores::buscar($id);
        $errores = Propiedad::mostrarErrores();
       
        if ($_SERVER["REQUEST_METHOD"] === "POST") { // con este codigo se valida un formulario

            $vendedor->sincronizar($_POST);

            // if (!$imagen["name"] || $imagen["error"]) {
            //     $errores[] = "Debes añadir una foto";
            // }
            $errores = $vendedor->validar();


            if (empty($errores)) { //empty valida si errores esta vacio
                $resultado = $vendedor->actualizar();

                if ($resultado) {
                    header("Location: /bienesraicesMVC/admin?resultado=2");
                }
            }
        }
        $router->render("vendedores/actualizar", ["vendedor"=> $vendedor, "errores"=> $errores]);
    }
    public static function eliminar()
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

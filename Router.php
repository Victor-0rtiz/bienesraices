<?php

namespace MVC;

class Router
{
    public $rutasGET = [];
    public $rutasPOST = [];


    public function get($url, $funcion)
    {
        $this->rutasGET[$url] = $funcion;
    }
    public function post($url, $funcion)
    {
        $this->rutasPOST[$url] = $funcion;
    }

    public function comprobarRutas()
    {
        session_start();
        
        $aut = $_SESSION["login"] ?? null;

       $rutasProtegidas= ['/admin','/propiedades/crear', "/propiedades/actualizar", "/propiedades/eliminar", "/vendedores/crear", "/vendedores/actualizar", "/vendedores/eliminar"];

        $urlActual = $_SERVER["PATH_INFO"] ?? "/";
        $metodoComprobacion = $_SERVER["REQUEST_METHOD"];

        if ($metodoComprobacion === "GET") {
            $fn = $this->rutasGET[$urlActual] ?? null;
        } else {

            $fn = $this->rutasPOST[$urlActual] ?? null;
        }
        
        if (in_array($urlActual, $rutasProtegidas) && !$aut) {
            header("location: ../");
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Pagina no encontrada";
        }
    }
    public function render($views, $arr = [])
    {
        ob_start();
        foreach ($arr as $key => $value) {
            $$key = $value;
        }
        include __DIR__ . "/views/$views.php";
        $contenido = ob_get_clean();
        include __DIR__ . "/views/layout.php";
    }
}

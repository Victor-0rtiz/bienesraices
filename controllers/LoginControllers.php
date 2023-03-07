<?php

namespace Controllers;

use Model\Admin;
use MVC\Router;


class LoginControllers
{

    public static function login(Router $router)
    {

        $errores = [];


        if ($_SERVER["REQUEST_METHOD"] === "POST") {


            $auth = new Admin($_POST);
            $errores = $auth->validar();
            if (empty($errores)) {
                $resultado = $auth->buscarUsuario();
                if (!$resultado) {
                    $errores = Admin::mostrarErrores();
                } else {
                    $autenticado = $auth->validarPassword($resultado);
                    if ($autenticado) {
                        $auth->autenticar();
                    } else {
                        $errores = Admin::mostrarErrores();
                    }
                }
            }
        }
        $router->render("auth/login", ["errores" => $errores]);
    }
    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header("location: ./");
    }
}

<?php

namespace Controllers;

use Model\Propiedad;
use MVC\Router;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasControllers
{
    public static function index(Router $router)
    {
        $propiedades = Propiedad::seleccionar(3);
        $inicio = true;
        $router->render("paginas/index", ["propiedades" => $propiedades, "inicio" => $inicio]);
    }
    public static function nosotros(Router $router)
    {

        $router->render("paginas/nosotros", []);
    }
    public static function propiedades(Router $router)
    {

        $propiedades = Propiedad::all();
        $router->render("paginas/propiedades", ["propiedades" => $propiedades]);
    }
    public static function propiedad(Router $router)
    {
        $id = validarId("./propiedades");
        $propiedad = Propiedad::buscar($id);
        $router->render("paginas/propiedad", ["propiedad" => $propiedad]);
    }
    public static function blog(Router $router)
    {

        $router->render("paginas/blog");
    }
    public static function entrada(Router $router)
    {

        $router->render("paginas/entrada");
    }
    public static function contacto(Router $router)
    {
        $mensaje = false;
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $mail = new PHPMailer();
            $respuestas = $_POST;
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = 'ba932c5898d303';
            $mail->Password = 'f1e9b0885034e1';
            $mail->SMTPSecure = "tls";


            $mail->setFrom("admin@bienesraices.com");
            $mail->addAddress("admin@bienesraices.com", "BienesRaices");
            $mail->Subject = "Tienes un Correo";


            $mail->isHTML(true);
            $cuerpo = "<html> <p> Acabas de recibir un nuevo mensaje </p>";
            $cuerpo .= "<p> El cliente: {$respuestas['nombre']} </p>";
            $cuerpo .= "<p>Dice que: {$respuestas['mensaje']} </p>";
            $cuerpo .= "<p>Desea: {$respuestas['tipo']} </p>";
            $cuerpo .= "<p>Cuenta con un presupesto de: $ {$respuestas['presupuesto']} </p>";
            $cuerpo .= "<p>Y quiere ser contactado por {$respuestas['contacto']} </p>";
            if ($respuestas["contacto"] == "email") {
                $cuerpo .= "<p>Su email es: {$respuestas['email']} </p>";
            } else {
                $cuerpo .= "<p>Su telefono es: {$respuestas['telefono']} </p>";
                $cuerpo .= "<p>Desea ser contactado a las {$respuestas['hora']} </p>";
                $cuerpo .= "<p>del dia {$respuestas['fecha']} </p>";
            }
            $cuerpo .= " </html>";
            $mail->Body = $cuerpo;

            if ($mail->send()) {
                $mensaje = "Enviado Correctamente";
            } else {
                $mensaje = "Error no enviado";
            }
        }

        $router->render("paginas/contacto", ["mensaje" => $mensaje]);
    }
}

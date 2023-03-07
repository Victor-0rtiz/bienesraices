<?php

namespace Model;

class Admin extends ActiveRecord
{

    protected static $tabla = "usuarios";
    protected static $columnaDB = ["id", "email", "password"];

    public $id;
    public $email;
    public $password;
    public function __construct($arg = [])
    {
        $this->id = $arg["id"] ?? null;
        $this->email = $arg["email"] ?? "";
        $this->password = $arg["password"] ?? "";
    }
    public function validar()
    {
        if (!$this->email) {
            self::$errores[] = "Ingrese un Email";
        }
        if (!$this->password) {
            self::$errores[] = "Ingrese un Password";
        }


        return self::$errores;
    }
    public function buscarUsuario()
    {
        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1;";
        $resultado = self::$db->query($query);
        if (!$resultado->num_rows) {
            self::$errores[] = "El usuario no existe";
            return;
        }
        return $resultado;
    }
    public function validarPassword($resultado)
    {
        $usuario = $resultado->fetch_object();
        $autentificacion = password_verify($this->password, $usuario->password);

        if (!$autentificacion) {
            self::$errores[] = "El password es incorrecto";
        }
        return $autentificacion;
    }
    public function autenticar()
    {
        session_start();
        $_SESSION["usuario"] = $this->email;
        $_SESSION["login"] = true;
        header("location: ./admin");
    }
}

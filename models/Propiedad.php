<?php

namespace Model;

class Propiedad extends ActiveRecord
{
    //base de datos, se crea aqui como estatico para que no se instancie al usar el constructor
    protected static $columnaDB = ["id", "titulo", "precio", "imagen", "descripcion", "habitaciones", "baños", "estacionamientos", "creado", "vendedores_id"];
    protected static $tabla= "propiedades";
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $baños;
    public $estacionamientos;
    public $creado;
    public $vendedores_id;
    public function __construct($arg = [])
    {
        $this->id = $arg["id"] ?? null;
        $this->titulo = $arg["titulo"] ?? "";
        $this->precio = $arg["precio"] ?? "";
        $this->imagen = $arg["imagen"] ?? "";
        $this->descripcion = $arg["descripcion"] ?? "";
        $this->habitaciones = $arg["habitaciones"] ?? "";
        $this->baños = $arg["baños"] ?? "";
        $this->estacionamientos = $arg["estacionamientos"] ?? "";
        $this->creado = date("Y/m/d");
        $this->vendedores_id = $arg["vendedores_id"] ?? "";
    }
    //con este validamos si los datos estan bien 
    public function validar()
    {

        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "Debes añadir un precio";
        }
        if (!$this->descripcion) {
            self::$errores[] = "Debes añadir una descripcion";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir una habitacion";
        }
        if (!$this->baños) {
            self::$errores[] = "Debes añadir un baño";
        }
        if (!$this->estacionamientos) {
            self::$errores[] = "Debes añadir un estacionamiento";
        }
        if (!$this->vendedores_id) {
            self::$errores[] = "Debes añadir un vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una foto";
        }
        return self::$errores;
    }
   
}

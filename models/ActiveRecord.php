<?php

namespace Model;

class ActiveRecord
{
    protected static $db; //base de datos, se crea aqui como estatico para que no se instancie al usar el constructor
    protected static $columnaDB = [];
    protected static $errores = [];
    protected static $tabla = "";
 
  
    ///guardamos los datos con sanitizar, y guardamos con el db-> query, todo esto se llena con los datos 
    //pasados al objeto
    public function guardarDatos()
    {
        $dato = $this->sanitizar(); //sanitizar itera los datos del objeto y crea un arreglo asociativo que insertamos en la db
        $queryInsert = "INSERT INTO " . static::$tabla . " (" . join(", ", array_keys($dato)) . " ) VALUES ( '" . join("', '", array_values($dato)) . "' );";

        $resultado = self::$db->query($queryInsert);
        return $resultado;
    }

    
    public function actualizar()
    {
        $datos = $this->sanitizar();
        $nuevo = [];
        foreach ($datos as $key => $value) {
            $nuevo[] = "{$key} = '{$value}'";
        }
        $query = "UPDATE " . static::$tabla . " SET " . join(", ", $nuevo) . " WHERE id= {$this->id};";
        $resultado = self::$db->query($query);
        return $resultado;
    }


    public function eliminar()
    {
        $query = "DELETE FROM " . static::$tabla . " WHERE id =" . self::$db->escape_string($this->id) . " LIMIT 1;";
        $resultado = self::$db->query($query);
        $existeImagen = file_exists(RUTA_IMAGENES . $this->imagen);
        if ($existeImagen) {
            unlink(RUTA_IMAGENES . $this->imagen);
        }
        return $resultado;
    }



    //le damos la base de datos con esta funcion
    public static function setDataBase($databBase)
    {
        self::$db = $databBase;
    }

    //con esta creamos un arreglo con los datos de la clase
    public function atributos()
    {
        $atributo = [];
        foreach (static::$columnaDB as $columna) {
            if ($columna === "id") continue;
            $atributo[$columna] = $this->$columna; //aqui asignamos el valor al array de atributo
        }
        return $atributo;
    }

    //con este sanitizamos 
    public function sanitizar()
    {
        $atributos = $this->atributos();
        $datos = [];
        foreach ($atributos as $key => $value) {
            $datos[$key] = self::$db->escape_string($value);
        }
        return $datos;
    }


    //subir imagen
    public function setImagen($imagen)
    {
        if (!is_null($this->id)) {
            $existeImagen = file_exists(RUTA_IMAGENES . $this->imagen);
            if ($existeImagen) {
                unlink(RUTA_IMAGENES . $this->imagen);
            }
        }
        if ($imagen) { //asignar el nombre al dato
            $this->imagen = $imagen;
        }
    }

    //con este mostramos errores
    public static function mostrarErrores()
    {
        return static::$errores;
    }

    //con este validamos si los datos estan bien 
    public function validar()
    {

    //    static::$errores=[];
        return static::$errores;
    }

    //funcion de consulta a la base de datos, para eso hay que traer los datos como un objeto
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla . " ;";  //primero hacemos el query
   
        $respuesta = self::consultaSql($query); //despues llamamos la funcion que realizara el query
        return $respuesta;
    }
    public static function buscar($id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE id={$id};";
        $resultado = self::consultaSql($query);
        return array_shift($resultado);
    }

    public static function seleccionar($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $limite." ;";
        $resultado = self::consultaSql($query);
        return $resultado;
    }

    public static function consultaSql($query)
    { //creamos la funcion que creara la consulta y traera un array de objeto
        $array = []; //creamos el arreglo
        $respuesta = self::$db->query($query); //realizamos la consulta a la db
        while ($fila = $respuesta->fetch_assoc()) { //itineramos para llenar el array
            $array[] = static::crearObjeto($fila); //con esta funcion creamos un objeto

        }
        return $array;
    }

    protected static function crearObjeto($fila)
    {
        $objeto = new static; //para crear un objeto usamos el self que hace referencia a si mismo
        foreach ($fila as $key => $value) { //itineramos el arreglo que recibimos del while
            if (property_exists($objeto, $key)) { //verificamos si la llave existe
                $objeto->$key = $value; //asignamos
            }
        }
        return $objeto;
    }
    public function sincronizar($arreglo = [])
    {
        foreach ($arreglo as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }
}

<?php

abstract class Product
{  
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $ingredientes;
    protected $precio;
    protected $imagen;
    
    /*
    // Para poder usar fetch_object hay que vaciar el construct
    public function __construct($nombre, $precio, $talla)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->talla = $talla;
    }
    */

    public function __construct($id, $nombre, $descripcion, $ingredientes, $precio, $imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->ingredientes = $ingredientes;
        $this->precio = $precio;
        $this->imagen = $imagen;

    }
    public function GetId()
    {
        return $this->id;
    }

    public function GetNombre()
    {
        return $this->nombre;
    }

    public function GetDescripcion()
    {
        return $this->descripcion;
    }

    public function GetIngredientes()
    {
        return $this->ingredientes;
    }

    public function GetPrecio()
    {
        return $this->precio;
    }
    public function GetImagen()
    {
        return $this->imagen;
    }

    public function SetId($value)
    {
        $this->nombre = $value;
    }

    public function SetNombre($value)
    {
        $this->nombre = $value;
    }

    public function SetDescripcion($value)
    {
        $this->descripcion = $value;
    }

    public function SetIngredientes($value)
    {
        $this->ingredientes = $value;
    }

    public function SetPrecio($value)
    {
        $this->precio = $value;
    }
    
    public function SetImagen($value)
    {
        $this->imagen = $value;
    }
}

?>
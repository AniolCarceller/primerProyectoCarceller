<?php

abstract class Product
{
    protected $nombre;
    protected $precio;
    protected $talla;
    protected $tipo;
    
    /*
    // Para poder usar fetch_object hay que vaciar el construct
    public function __construct($nombre, $precio, $talla)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->talla = $talla;
    }
    */

    public function __construct()
    {

    }

    public function GetNombre()
    {
        return $this->nombre;
    }

    public function GetPrecio()
    {
        return $this->precio;
    }

    public function GetTalla()
    {
        return $this->talla;
    }

    public function SetNombre($value)
    {
        $this->nombre = $value;
    }

    public function SetPrecio($value)
    {
        $this->precio = $value;
    }

    public function SetTalla($value)
    {
        $this->talla = $value;
    }
}

?>
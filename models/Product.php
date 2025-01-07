<?php

abstract class Product
{  
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $ingredientes;
    protected $precio;
    protected $imagen;
    protected $tipo;
    protected $oferta;
    protected $fecha_final;
    

    public function __construct($id, $nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo, $oferta, $fecha_final)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->ingredientes = $ingredientes;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->tipo = $tipo;
        $this->oferta = $oferta;
        $this->fecha_final = $fecha_final;

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
    public function GetTipo()
    {
        return $this->tipo;
    }
    public function GetOferta()
    {
        return $this->oferta;
    }
    public function GetFechaFinal()
    {
        return $this->fecha_final;
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
    public function SetTipo($value)
    {
        $this->tipo = $value;
    }
    public function SetOferta($value)
    {
        $this->oferta = $value;
    }
    public function SetFechaFinal($value)
    {
        $this->fecha_final = $value;
    }
}

?>
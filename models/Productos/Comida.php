<?php
include_once("models/Product.php");
class Comida extends Product
{
    public function __construct($id, $nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo)
    {
        parent::__construct($id, $nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo);
    }
}

?>
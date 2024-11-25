<?php
include_once("models/DatabaseAccessObjectProductos.php");
class productoController {
    public function index()
    {
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("nombre");
        include "views/index.php";
    }
    public function carta(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("nombre");
        include "views/carta.php";
    }
}
?>
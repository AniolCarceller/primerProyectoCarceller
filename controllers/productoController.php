<?php
include_once("models/DatabaseAccessObjectProductos.php");
class productoController {
    public function index(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("nombre");
        include "views/index.php";
    }
    public function carta(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("nombre");
        include "views/carta.php";
    }
    public function pedir(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("nombre");
        include "views/pedir.php";
    }
    public function iniciarsession(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("nombre");
        include "views/iniciarsession.php";
    }
}
?>
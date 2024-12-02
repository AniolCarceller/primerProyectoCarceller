<?php
session_start();
include_once("models/DatabaseAccessObjectProductos.php");
include_once("models/DatabaseAccessObjectUsuarios.php");
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
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/iniciarsession.php";
    }
    public function registro(){
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/registro.php";
    }
}
?>
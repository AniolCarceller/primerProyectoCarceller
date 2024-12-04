<?php
session_start();
include_once("models/DatabaseAccessObjectProductos.php");
include_once("models/DatabaseAccessObjectUsuarios.php");
class productoController {
    public function index(){
        include "views/index.php";
    }
    public function carta(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("");
        include "views/carta.php";
    }
    public function pedir(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("");
        include "views/pedir.php";
    }
    public function iniciarsesion(){
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/iniciarsesion.php";
    }
    public function cerrarsesion(){
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/cerrarsesion.php";
    }
    public function registro(){
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/registro.php";
    }
    public function cuenta(){
        $daoPedido = new DatabaseAccessObjectProductos();
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/cuenta.php";
    }
}
?>
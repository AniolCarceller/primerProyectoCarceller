<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
//Controller que redirige a todas las paginas
include_once("models/DatabaseAccessObjectProductos.php");
include_once("models/DatabaseAccessObjectUsuarios.php");
class productoController {
    public function index(){
        include "views/index.php";
    }
    public function carta(){
        $dao = new DatabaseAccessObjectProductos();
        include "views/carta.php";
    }
    public function pedir(){
        $dao = new DatabaseAccessObjectProductos();
        $productos = $dao->getAllProductos("");
        include "views/pedir.php";
    }
    public function iniciarsesion(){
        $daoUsers = new DatabaseAccessObjectUsuarios();
        include "views/iniciarsesion.php";
    }
    public function cerrarsesion(){
        include "views/cerrarsesion.php";
    }
    public function registro(){
        $daoUsers = new DatabaseAccessObjectUsuarios();
        include "views/registro.php";
    }
    public function cuenta(){
        $daoPedido = new DatabaseAccessObjectProductos();
        $dao = new DatabaseAccessObjectUsuarios();
        include "views/cuenta.php";
    }
    public function panelAdministracion(){
        include "views/panelAdministracion.php";
    }
    public function error404(){
        include "views/error404.php";
    }
}
?>
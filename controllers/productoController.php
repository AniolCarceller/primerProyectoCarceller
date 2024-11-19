<?php
include_once("config/DatabaseAccessObjectProductos.php");
class productoController {
    public function index()
    {
        $dao = new DatabaseAccessObjectProductos();

        // Obtener camisetas como objetos Shirt
        $productos = $dao->getAllProductos("nombre");
        
        // Incluir la vista y pasar los datos
        include_once("views/index.php");
    }
    public function carta(){
        include "views/carta.php";
    }
}
?>
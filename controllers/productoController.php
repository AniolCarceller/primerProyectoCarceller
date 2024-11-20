<?php
include_once("models/DatabaseAccessObjectProductos.php");
class productoController {
    public function index()
    {
        $dao = new DatabaseAccessObjectProductos();

        // Obtener camisetas como objetos Shirt
        $productos = $dao->getAllProductos("nombre");
        foreach ($productos as $producto){
            var_dump($producto->getNombre());
        }
        // Incluir la vista y pasar los datos
    }
    public function carta(){
        include "views/carta.php";
    }
}
?>
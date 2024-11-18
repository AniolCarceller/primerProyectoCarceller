<?php
include_once("config/DatabaseAccessObject.php");
class productoController {
    public function index()
    {
        $dao = new DatabaseAccessObject();
        $productos = $dao->getAllCamisetas("nombre");
        include_once("views/index.php");
        while ($row = $productos->fetch_assoc()) {
            // Muestra los datos de la fila
            echo "ID: " . $row['id_producto'] . "<br>";
            echo "Nombre: " . $row['nombre'] . "<br>";
            echo "Descripción: " . $row['descripcion'] . "<br>";
            echo "Ingredientes: " . $row['ingredientes'] . "<br>";
            echo "Precio: " . $row['precio'] . "<br>";
            echo "<hr>"; // Línea de separación entre productos
        }
    }
    public function carta(){
        include "views/carta.php";
    }
}
?>
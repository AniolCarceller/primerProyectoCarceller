<?php
class dataBaseProductos
{
    public $conn;

    public function __construct($host = "localhost", $user = "root", $pass = "1234", $db = "mysql", $puerto = "3306")
    {
        $this->conn = $this->connect($host, $user, $pass, $db, $puerto);
    }

    public function connect($host, $user, $pass, $db, $puerto)
    {
        try {
            $connection = new mysqli($host, $user, $pass, $db, $puerto);
            return $connection;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

class apiProductos
{
    public function getAllProductos()
    {
        $productos = [];
        $db = new dataBaseProductos;
        $conn = $db->conn;
        $query = $conn->prepare("SELECT * FROM bbdd.productos");
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $productos[] = $row;
            }
        }
        return $productos;
    }

    public function insertProducto($nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo)
    {
        $db = new dataBaseProductos;
        $conn = $db->conn;
        $query = $conn->prepare("INSERT INTO bbdd.productos(nombre, descripcion, ingredientes, precio, imagen, tipo)  VALUES($nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo)");
        $query->execute();
    }

    public function updateProducto($id_producto, $nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo)
    {
        $db = new dataBaseProductos;
        $conn = $db->conn;
        $query = $conn->prepare("UPDATE bbdd.productos SET nombre = '$nombre', descripcion = '$descripcion', ingredientes = '$ingredientes', precio = '$precio', imagen = '$imagen', tipo = '$tipo' WHERE id_producto = '$id_producto'");
        $query->execute();
    }

    public function deleteProducto($id_producto)
    {
        $db = new dataBaseProductos;
        $conn = $db->conn;
        $query = $conn->prepare("DELETE FROM bbdd.productos WHERE id_producto = '$id_producto'");
        $query->execute();
    }
}

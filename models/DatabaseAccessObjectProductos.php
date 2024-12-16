<?php
include_once("Productos/Comida.php");
include_once("config/dataBase.php");
class DatabaseAccessObjectProductos
{
    public function getAllProductos($producto){
        $productos = [];
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query;
            if($producto!="") $query = $conn->prepare("SELECT * FROM bbdd.productos WHERE tipo='$producto'");
            else $query = $conn->prepare("SELECT * FROM bbdd.productos");
            $query->execute();
            $result = $query->get_result();
            while ($producto = $result->fetch_assoc()) {
                $fila = new Comida($producto["id_producto"], $producto["nombre"], $producto["descripcion"], $producto["ingredientes"], $producto["precio"], $producto["imagen"], $producto["tipo"], $producto["oferta"], $producto["fecha_final"]);
                $productos[] = $fila;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $productos;
    }
    public function insertProductos($userid, $ubicacion, $codigo_descuento, $precio){
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("INSERT INTO bbdd.pedidos(user_id, ubicacion, codigo_descuento, precio) VALUES('$userid', '$ubicacion', '$codigo_descuento', '$precio')");
            $query->execute();
            $pedidoid = $conn->insert_id;
            foreach ($_SESSION['carrito'] as $productoId => $producto){
                $query = $conn->prepare("INSERT INTO bbdd.pedidos_productos(pedido_id, user_id, producto_id, cantidad) VALUES('$pedidoid','$userid', '{$producto['id']}', '{$producto['cantidad']}')");
                $query->execute();
                $result = $query->get_result();
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function getAllPedidos(){
        $db = new dataBase;
        $conn = $db->conn;
        $productos = [];
        try {
            $query = $conn->prepare("SELECT * FROM bbdd.productos");
            $query->execute();
            $result = $query->get_result();
            while ($producto = $result->fetch_assoc()) {
                $fila = new Comida($producto["id_producto"], $producto["nombre"], $producto["descripcion"], $producto["ingredientes"], $producto["precio"], $producto["imagen"], $producto["tipo"], $producto["oferta"], $producto["fecha_final"]);
                $productos[] = $fila;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $productos;
    }
    public function getAllTipos(){
        $tipos = [];
        try {
            $db = new dataBase;
            $conn = $db->conn;
            
            // Consulta para obtener tipos únicos de productos
            $query = $conn->prepare("SELECT DISTINCT tipo FROM bbdd.productos");
            $query->execute();
            $result = $query->get_result();

            // Recorre el resultado y almacena los tipos en el arreglo
            while ($row = $result->fetch_assoc()) {
                $tipos[] = $row['tipo'];
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $tipos;
    }
}
?>
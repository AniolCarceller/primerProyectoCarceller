<?php

/*
 * Progreso del viernes, creamos un patron de programacion llamado DAO (DatabaseAccessObject) el cual
 * centraliza todas las operaciones de la base de datos, todas las salidas de las funciones devuelven valores
 * nunca tiene que devolver un objeto tipo mysqli para evitar problemas.
 */
include_once("Productos/Comida.php");
include_once("config/dataBase.php");
class DatabaseAccessObjectProductos
{
    public function getAllProductos($order = "nombre"){
        $productos = [];
    
        try {
    
            // Consulta SQL
            $query = $conn->prepare("SELECT * FROM bbdd.productos ORDER BY {$order} DESC");
            $query->execute();
            $result = $query->get_result();
            // Convertir cada fila en un objeto Shirt
            while ($producto = $result->fetch_assoc()) {
                $fila = new Comida($producto["id_producto"], $producto["nombre"], $producto["descripcion"], $producto["ingredientes"], $producto["precio"], $producto["imagen"], $producto["tipo"]);
                $productos[] = $fila;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $productos;
    }
    public function insertProductos($userid, $ubicacion, $codigo_descuento, $precio){
    
        try {
            $query = $conn->prepare("INSERT INTO bbdd.pedidos(user_id, ubicacion, codigo_descuento, precio) VALUES('$userid', '$ubicacion', '$codigo_descuento', '$precio')");
            $query->execute();
            // Consulta SQL
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
    public function getAllPedidos($order = "nombre"){
        $productos = [];
    
        try {
    
            // Consulta SQL
            $query = $conn->prepare("SELECT * FROM bbdd.productos ORDER BY {$order} DESC");
            $query->execute();
            $result = $query->get_result();
            // Convertir cada fila en un objeto Shirt
            while ($producto = $result->fetch_assoc()) {
                $fila = new Comida($producto["id_producto"], $producto["nombre"], $producto["descripcion"], $producto["ingredientes"], $producto["precio"], $producto["imagen"], $producto["tipo"]);
                $productos[] = $fila;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $productos;
    }
}

?>
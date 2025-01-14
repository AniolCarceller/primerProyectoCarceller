<?php
class dataBasePedidos
{
    // Conexión con la base de datos
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

class apiPedidos
{
    public function getAllPedidos()
    {
        $pedidos = [];
        $db = new dataBasePedidos;
        $conn = $db->conn;
        $query = $conn->prepare("SELECT * FROM bbdd.pedidos");
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
        }
        return $pedidos;
    }

    public function insertPedido($user_id, $ubicacion, $precio)
    {
        $db = new dataBasePedidos;
        $conn = $db->conn;
        $query = $conn->prepare("INSERT INTO bbdd.pedidos(user_id, ubicacion, precio) VALUES('$user_id', '$ubicacion', '$precio')");
        $query->execute();
    }

    public function updatePedido($pedidoId, $user_id, $ubicacion, $precio)
    {
        $db = new dataBasePedidos;
        $conn = $db->conn;
        $query = $conn->prepare("UPDATE `bbdd`.`pedidos` SET `user_id` = '$user_id', `ubicacion` = '$ubicacion', `precio` = '$precio' WHERE `pedido_id` = '$pedidoId'");
        $query->execute();
    }

    public function deletePedido($pedidoId)
    {
        $db = new dataBasePedidos;
        $conn = $db->conn;
        $query = $conn->prepare("DELETE FROM bbdd.pedidos WHERE pedido_id = '$pedidoId'");
        $query->execute();
    }
}
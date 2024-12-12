<?php
include_once("config/dataBase.php");
class apiPedidos
{
    public function getAllPedidos(){
        $pedidos = [];
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("SELECT * FROM bbdd.pedidos");
            $query->execute();
            $result = $query->get_result();
            while ($row = $result->fetch_assoc()) {
                $pedidos[] = $row;
            }
        } catch (Exception $e) {
            return json_encode("Error: " . $e->getMessage());
        }
        return $pedidos;
    }
    public function insertPedidos($nombreApellidos, $correo, $contraseña){
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("INSERT INTO bbdd.Pedidos(nombre_apellidos, correo, contraseña) VALUES('$nombreApellidos', '$correo', '$contraseña')");
            $query->execute();
            } catch (Exception $e) {
            return json_encode("Error: " . $e->getMessage());
        }
        return json_encode("Se ha insertado el usuario con este id: ". insert_id)   ;
    }
    public function updatePedidos($userId, $nombreApellidos, $correo, $contraseña){
        try {
            $db = new dataBase;
            $conn = $db->conn;
            if($contraseña){
                $query = $conn->prepare("UPDATE `bbdd`.`pedidos` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo', `contraseña` = '$contraseña' WHERE `user_id` = '$userId'");
            }
            else{
                $query = $conn->prepare("UPDATE `bbdd`.`pedidos` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo' WHERE `user_id` = '$userId'");
            }
            $query->execute();
        } catch (Exception $e) {
            return json_encode("Error: " . $e->getMessage());
        }
        return json_encode("Se ha modificado el usuario con este id: ". $userId);
    }
    public function deletePedidos($userId){
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("DELETE FROM `bbdd`.`pedidos` WHERE (`user_id` = '$userId')");
            $query->execute();
        } catch (Exception $e) {
            return json_encode("Error: " . $e->getMessage());
        }
        return json_encode("Se ha eliminado el usuario con este id: ". $userId);
    }
}
?>
<?php
include_once("config/dataBase.php");
class DatabaseAccessObjectUsuarios
{
    public function getAllUsers(){
        $users = [];
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("SELECT * FROM bbdd.users");
            $query->execute();
            $result = $query->get_result();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        return $users;
    }
    public function insertUsers($nombreApellidos, $correo, $contraseña){
        try {
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("INSERT INTO bbdd.users(nombre_apellidos, correo, contraseña) VALUES('$nombreApellidos', '$correo', '$contraseña')");
            $query->execute();
            
            // Consulta SQL
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    public function updateUsers($userId, $nombreApellidos, $correo, $contraseña){
        try {
            $db = new dataBase;
            $conn = $db->conn;
            if($contraseña){
                $query = $conn->prepare("UPDATE `bbdd`.`users` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo', `contraseña` = '$contraseña' WHERE `user_id` = '$userId'");
            }
            else{
                $query = $conn->prepare("UPDATE `bbdd`.`users` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo' WHERE `user_id` = '$userId'");
            }
            $query->execute();
            // Consulta SQL
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>
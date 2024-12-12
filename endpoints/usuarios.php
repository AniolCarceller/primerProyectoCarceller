<?php
include_once("config/dataBase.php");
class apiUsers
{
    public function getAllUsers(){
        $users = [];
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("SELECT * FROM bbdd.users");
            $query->execute();
            $result = $query->get_result();
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }

        return json_encode($users);
    }
    public function insertUsers($nombreApellidos, $correo, $contraseña){
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("INSERT INTO bbdd.users(nombre_apellidos, correo, contraseña) VALUES('$nombreApellidos', '$correo', '$contraseña')");
            $query->execute();
    
        return json_encode("Se ha insertado el usuario con este id: ". insert_id);
    }
    public function updateUsers($userId, $nombreApellidos, $correo, $contraseña){
            $db = new dataBase;
            $conn = $db->conn;
            if($contraseña){
                $query = $conn->prepare("UPDATE `bbdd`.`users` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo', `contraseña` = '$contraseña' WHERE `user_id` = '$userId'");
            }
            else{
                $query = $conn->prepare("UPDATE `bbdd`.`users` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo' WHERE `user_id` = '$userId'");
            }
            $query->execute();

        return json_encode("Se ha modificado el usuario con este id: ". $userId);
    }
    public function deleteUsers($userId){
            $db = new dataBase;
            $conn = $db->conn;
            $query = $conn->prepare("DELETE FROM `bbdd`.`users` WHERE (`user_id` = '$userId')");
            $query->execute();

        return json_encode("Se ha eliminado el usuario con este id: ". $userId);
    }
}
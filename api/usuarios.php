<?php
class dataBaseUsuarios
{
    // Conexion con la BBDD
    public $conn;

    public function __construct($host = "localhost", $user="root", $pass="1234", $db = "mysql", $puerto="3306")
    {
        $this->conn = $this->connect($host, $user,$pass,$db,$puerto);
    }

    // Devuelve la Conexion
    public function connect($host = "localhost", $user="root", $pass="1234", $db = "mysql", $puerto="3306")
    {
        try
        {
            $connection = new mysqli($host, $user,$pass, $db, $puerto);
            return $connection; 
        }
        catch(Exception $e)
        {
            echo $e;
        }
    }
}
class apiUsers
{
    public function getAllUsers() {
        $users = [];
        $db = new dataBaseUsuarios;
        $conn = $db->conn;
        $query = $conn->prepare("SELECT * FROM bbdd.users");
        $query->execute();
        $result = $query->get_result();
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $users[] = $row;
            }
        }
        return $users;
    }
    
    public function insertUsers($nombreApellidos, $correo, $contraseña){
        $db = new dataBaseUsuarios;
        $conn = $db->conn;
        $query = $conn->prepare("INSERT INTO bbdd.users(nombre_apellidos, correo, contraseña) VALUES('$nombreApellidos', '$correo', '$contraseña')");
        $query->execute();
    }
    public function updateUsers($userId, $nombreApellidos, $correo, $contraseña){
        $db = new dataBaseUsuarios;
        $conn = $db->conn;
        if($contraseña){
            $query = $conn->prepare("UPDATE `bbdd`.`users` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo', `contraseña` = '$contraseña' WHERE `user_id` = '$userId'");
        }
        else{
            $query = $conn->prepare("UPDATE `bbdd`.`users` SET `nombre_apellidos` = '$nombreApellidos', `correo` = '$correo' WHERE `user_id` = '$userId'");
        }
        $query->execute();
    }
    public function deleteUsers($userId){
        $db = new dataBaseUsuarios;
        $conn = $db->conn;
        $query = $conn->prepare("DELETE FROM `bbdd`.`users` WHERE (`user_id` = '$userId')");
        $query->execute();
    }
}
<?php

/*
 * Progreso del viernes, creamos un patron de programacion llamado DAO (DatabaseAccessObject) el cual
 * centraliza todas las operaciones de la base de datos, todas las salidas de las funciones devuelven valores
 * nunca tiene que devolver un objeto tipo mysqli para evitar problemas.
 */
include_once("config/dataBase.php");
class DatabaseAccessObjectUsuarios
{
    public function getAllUsers(){
        $users = [];
        try {
            $db = new dataBase;
            $conn = $db->conn;
    
            // Consulta SQL
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
}

?>
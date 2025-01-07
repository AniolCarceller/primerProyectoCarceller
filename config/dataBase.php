<?php
include_once("models/Productos/Comida.php");
class dataBase
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
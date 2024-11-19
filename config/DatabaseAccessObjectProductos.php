<?php

/*
 * Progreso del viernes, creamos un patron de programacion llamado DAO (DatabaseAccessObject) el cual
 * centraliza todas las operaciones de la base de datos, todas las salidas de las funciones devuelven valores
 * nunca tiene que devolver un objeto tipo mysqli para evitar problemas.
 */
include_once("models/Productos/Comida.php");
class DatabaseAccessObjectProductos
{
    // Conexion con la BBDD
    private $conn;

    // Al crear el objeto DAO se conecta con la BBDD
    public function __construct($host = "localhost", $user="root", $pass="1234", $db = "mysql", $puerto="8080")
    {
        $this->conn = $this->connect($host, $user,$pass,$db,$puerto);
    }

    // Devuelve la Conexion
    public function connect($host = "localhost", $user="root", $pass="1234", $db = "mysql", $puerto="8080")
    {
        try
        {
            $connection = new mysqli($host, $user,$pass, $db,$puerto);
            return $connection; 
        }
        catch(Exception $e)
        {
            echo $e;
        }
    }
    public function getAllProductos($order = "nombre")
    {
        // Lista blanca para columnas permitidas
        $whitelist = ["nombre", "precio", "talla", "id"];
        if (!in_array($order, $whitelist)) {
            $order = "nombre"; // Por defecto, ordenar por nombre
        }
    
        $productos = [];
    
        try {
            $conn = $this->conn;
    
            // Consulta SQL
            $query = $conn->prepare("SELECT * FROM bbdd.productos ORDER BY {$order} DESC");
            $query->execute();
            $result = $query->get_result();
    
            // Convertir cada fila en un objeto Shirt
            while ($producto = $result->fetch_object("Comida")) {
                $productos[] = $producto;
            }
        } catch (Exception $e) {
            echo "Error al obtener camisetas: " . $e->getMessage();
        }
    
        return $productos;
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallafood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
</html>
<?php
include_once "controllers/productoController.php";
include_once "config/parameters.php";
include("views/header.php");
//Importa el menu i el estilo

if (!isset($_GET['controller'])) {
    header("Location: " . url . "producto/index");
} else {
    //Establece el nombre del controlador
    $nombre_controller = $_GET["controller"]."Controller";
    if (class_exists($nombre_controller)) {
        //Instancia el controlador
        $controller = new $nombre_controller();

        //Comprueba si action existe
        if(isset($_GET["action"]) && method_exists( $controller, $_GET["action"] )) {
            $action = $_GET["action"];
        } else {
            //Default action esta definido en parameters.php
            $action = default_action;
        }

        //ejecuta action en el controlador
        $controller -> $action();
    } else {
        header("Location: " . url . "producto/index");
    }
}
include("views/footer.php");

?>
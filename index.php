<?php
include_once "controllers/productoController.php";
include_once "config/parameters.php";
if(isset($_GET['controller']) && isset($_GET['action'])){
    if($_GET['action']!="iniciarsession"){
        include("views/header.php");
    }
}
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
if(isset($_GET['controller']) && isset($_GET['action'])){
    if($_GET['action']!="iniciarsession"){
include("views/footer.php");
    }
}

?>
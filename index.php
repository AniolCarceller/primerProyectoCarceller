<?php
include_once "controllers/productoController.php";
include_once "config/parameters.php";
if (isset($_GET['controller']) && isset($_GET['action'])) {
    // Condición para acciones que no sean iniciar sesión o registro
    if ($_GET['action'] != "iniciarsesion" && $_GET['action'] != "registro") {
        // Verifica si la sesión está activa
        if (isset($_SESSION['usuario_id'])) {
            include("views/headerLogin.php");
            // Usuario autenticado: carga el encabezado estándar
        } else {
            // Usuario no autenticado: carga el encabezado para login
            include("views/header.php");
        }
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
if ($_GET['action'] != "iniciarsesion" && $_GET['action'] != "registro") {
    include("views/footer.php");
}

?>
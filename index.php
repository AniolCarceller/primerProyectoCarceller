<!--Vincula todas las paginas de la web-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallafood</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
</head>
<body>
<?php
include_once "controllers/productoController.php";
include_once "controllers/apiController.php";
include_once "config/parameters.php";
if (isset($_GET['controller']) && isset($_GET['action'])) {
    if ($_GET['action'] != "iniciarsesion" && $_GET['action'] != "registro") {
        if (isset($_SESSION['usuario_id'])) {
            include("views/headerLogin.php");
        } else {
            include("views/header.php");
        }
    }
}

if (!isset($_GET['controller'])) {
    header("Location: ?controller=producto&action=index");
} else {
    $nombre_controller = $_GET["controller"]."Controller";
    if (class_exists($nombre_controller)) {
        $controller = new $nombre_controller();

        if(isset($_GET["action"]) && method_exists( $controller, $_GET["action"] )) {
            $action = $_GET["action"];
        } else {
            $action = default_action;
        }

        $controller -> $action();
    } else {
        header("Location: ?controller=producto&action=index");
    }
}
if ($_GET['action'] != "iniciarsesion" && $_GET['action'] != "registro") {
    include("views/footer.php");
}

?>
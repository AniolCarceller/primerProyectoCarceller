<?php
include_once("config/dataBase.php");
include_once("endpoints/usuarios.php");
include_once("endpoints/pedidos.php");
header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
$usuarios = new apiUsers();
try {
    $action = $_GET['action'];
    switch ($action) {
        case 'panelAdministracionUsers':
            $data = $usuarios->getAllUsers();
            echo json_encode($data);
            break;

        case 'insertUser':
            $nombreApellidos = $_POST['nombre_apellidos'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            echo insertUsers($nombreApellidos, $correo, $contraseña);
            break;

        case 'updateUser':
            $userId = $_POST['user_id'];
            $nombreApellidos = $_POST['nombre_apellidos'];
            $correo = $_POST['correo'];
            $contraseña = $_POST['contraseña'];
            echo updateUsers($userId, $nombreApellidos, $correo, $contraseña);
            break;

        case 'deleteUser':
            $userId = $_POST['user_id'];
            echo deleteUsers($userId);
            break;
    }
} catch (Exception $e) {
}
?>

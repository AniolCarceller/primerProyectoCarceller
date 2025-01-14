<?php
include_once("usuarios.php");
include_once("pedidos.php");
include_once("productos.php");

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$usuarios = new apiUsers();
$pedidos = new apiPedidos();
$productos = new apiProductos();

try {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        switch ($action) {
            //Usuarios
            case 'panelAdministracion':
                echo json_encode($usuarios->getAllUsers());
                break;
            case 'insertUser':
                $nombreApellidos = $_POST['nombre_apellidos'];
                $correo = $_POST['correo'];
                $contraseña = $_POST['contraseña'];
                echo $usuarios->insertUsers($nombreApellidos, $correo, $contraseña);
                break;
            case 'updateUser':
                $userId = $_POST['user_id'];
                $nombreApellidos = $_POST['nombre_apellidos'];
                $correo = $_POST['correo'];
                $contraseña = $_POST['contraseña'];
                echo $usuarios->updateUsers($userId, $nombreApellidos, $correo, $contraseña);
                break;
            case 'deleteUser':
                $userId = $_POST['user_id'];
                echo $usuarios->deleteUsers($userId);
                break;

            //Pedidos
            case 'panelPedidos':
                echo json_encode($pedidos->getAllPedidos());
                break;
            case 'insertPedido':
                $userId = $_POST['user_id'];
                $ubicacion = $_POST['ubicacion'];
                $precio = $_POST['precio'];
                echo $pedidos->insertPedido($userId, $ubicacion, $precio);
                break;
            case 'updatePedido':
                $pedidoId = $_POST['pedido_id'];
                $userId = $_POST['user_id'];
                $ubicacion = $_POST['ubicacion'];
                $precio = $_POST['precio'];
                echo $pedidos->updatePedido($pedidoId, $userId, $ubicacion, $precio);
                break;
            case 'deletePedido':
                $pedidoId = $_POST['pedido_id'];
                echo $pedidos->deletePedido($pedidoId);
                break;
            //Productos
            case 'panelProductos':
                $data = $productos->getAllProductos();
                echo json_encode($data);
                break;

            case 'insertProducto':
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $ingredientes = $_POST['ingredientes'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $tipo = $_POST['tipo'];
                echo $productos->insertProducto($nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo);
                break;

            case 'updateProducto':
                $id_producto = $_POST['id_producto'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $ingredientes = $_POST['ingredientes'];
                $precio = $_POST['precio'];
                $imagen = $_POST['imagen'];
                $tipo = $_POST['tipo'];
                echo $productos->updateProducto($id_producto, $nombre, $descripcion, $ingredientes, $precio, $imagen, $tipo);
                break;

            case 'deleteProducto':
                $id_producto = $_POST['id_producto'];
                echo $productos->deleteProducto($id_producto);
                break;
            default:
                echo "";
        }
    }
} catch (Exception $e) {
    echo json_encode(["error" => $e->getMessage()]);
}

<?php
include_once("models/DatabaseAccessObjectProductos.php");
if (isset($_GET['id']) && $_GET['nombre'] && $_GET['precio']) {
    $productoId = $_GET['id'];
    $nombre = $_GET['nombre'];
    $precio = $_GET['precio'];
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    if (isset($_SESSION['carrito'][$productoId])) {
        $_SESSION['carrito'][$productoId]['cantidad'] += 1;
    } else {
            $_SESSION['carrito'][$productoId] = [
                'id' => $productoId,
                'cantidad' => 1,
                'nombre' => $nombre,
                'precio' => $precio
            ];
    }
    header("location: ?controller=producto&action=carta");
}
if (isset($_GET['eliminarid'])) {
    $productoId = $_GET['eliminarid'];
    if (isset($_SESSION['carrito'][$productoId])) {
        unset($_SESSION['carrito'][$productoId]);
    }
    header("location: ?controller=producto&action=carta");
}
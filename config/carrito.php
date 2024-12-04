<?php
if (isset($_GET['id'])) {
    $productoId = $_GET['id'];
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    if (isset($_SESSION['carrito'][$productoId])) {
        $_SESSION['carrito'][$productoId]['cantidad'] += 1;
    } else {
        $_SESSION['carrito'][$productoId] = [
            'id' => $productoId,
            'cantidad' => 1
        ];
    }
    header("location: ". url ."?controller=producto&action=carta");
}
if (isset($_GET['eliminarid'])) {
    $productoId = $_GET['eliminarid'];
    if (isset($_SESSION['carrito'][$productoId])) {
        unset($_SESSION['carrito'][$productoId]);
    }
    header("location: ". url ."?controller=producto&action=carta");
}
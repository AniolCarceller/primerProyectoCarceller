<?php
session_start();

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
}
if (isset($_GET['eliminarid'])) {
    $productoId = $_GET['eliminarid'];
    if (isset($_SESSION['carrito'][$productoId])) {
        unset($_SESSION['carrito'][$productoId]);
    }
}
?>
<ul>
    <?php foreach ($_SESSION['carrito'] as $productoId => $producto): ?>
        <li>
            ID: <?= htmlspecialchars($producto['id']) ?><br>
            Cantidad: <?= $producto['cantidad'] ?><br>
            <a href="?controller=producto&action=carta&eliminarid=<?= $producto['id'] ?>">
                <img src="img/eliminar.svg" alt="" class="icono">
            </a>
        </li>
    <?php endforeach; ?>
</ul>
<article>
<?php
foreach ($productos as $producto) { ?>
    <div class="cartaProducto">
        <div>
            <div class="col">
                <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="img-fluid">
            </div>
            <div>
                <h3><?php echo $producto->GetNombre(); ?></h3>
                <p><?php echo $producto->GetDescripcion(); ?></p>
                <p><?php echo $producto->GetPrecio(); ?></p>
                <a href="?controller=producto&action=carta&id=<?= $producto->GetId() ?>">
                    <img class="icono" src="img/añadir.svg" alt="">
                </a>
            </div>
        </div>
    </div>
<?php } ?>
</article>

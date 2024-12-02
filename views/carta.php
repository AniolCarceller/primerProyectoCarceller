<?php
include_once("config/carrito.php");
?>
<ul>
    <?php 
    if(!empty($_SESSION['carrito'])){
    foreach ($_SESSION['carrito'] as $productoId => $producto): ?>
        <li>
            ID: <?= $producto['id'] ?><br>
            Cantidad: <?= $producto['cantidad'] ?><br>
            <a href="?controller=producto&action=carta&eliminarid=<?= $producto['id'] ?>">
                <img src="img/eliminar.svg" alt="" class="icono">
            </a>
        </li>
    <?php endforeach; ?>
    <a href="?controller=producto&action=pedir">Pedir</a>
    <?php } ?>
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
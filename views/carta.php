<?php
include_once("config/carrito.php");
$productos = $dao->getAllProductos("");
$tipos = $dao->getAllTipos();
if(isset($_GET['tipo'])){
    $productos = $dao->getAllProductos($_GET['tipo']);
}
else{
    $productos = $dao->getAllProductos("");
}
?>
<div class="bodyCarta container-fluid d-flex">
    <div class="columnas tipos d-none d-md-flex flex-column align-items-center sticky-top">
        <h2>Filtros</h2>
        <a href="?controller=producto&action=carta">Todos los productos</a>
        <?php
        foreach ($tipos as $tipo) {
            echo "<br><a href='?controller=producto&action=carta&tipo=$tipo'>" . htmlspecialchars($tipo) . "</a>";
        }
        ?>
    </div>
    <article class="flex-grow-1 mx-auto overflow-auto d-flex justify-content-center flex-wrap flex-md-nowrap">
        <div class="container">
            <div class="row">
                <?php foreach ($productos as $producto) { ?>
                    <div class="articuloCarta col-md-4 col-12 mb-5">
                        <div class="d-flex justify-content-around">
                            <div>
                                <div class="productoCarta col">
                                    <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="img-fluid">
                                </div>
                                <div class="s"> <!-- Alineación centrada -->
                                    <h3><?php echo $producto->GetNombre(); ?></h3>
                                    <p><?php echo $producto->GetDescripcion(); ?></p>
                                    <?php if ($producto->GetOferta() && $producto->GetFechaFinal() >= date('Y-m-d')) { ?>
                                        <p><?php echo ($producto->GetPrecio() * (1 - $producto->GetOferta() / 100)); ?></p>
                                        <p><del><?php echo $producto->GetPrecio(); ?></del></p>
                                    <?php } else { ?>
                                        <p><?php echo $producto->GetPrecio(); ?></p>
                                    <?php } ?>
                                    <a href="?controller=producto&action=carta&id=<?= $producto->GetId() ?>">
                                        <img class="icono" src="img/añadir.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>
    
    <div class="columnas tipos d-none d-md-flex flex-column align-items-center sticky-top">
        <ul>
            <?php 
            if (!empty($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $productoId => $producto): ?>
                    <li class="mb-2">
                        ID: <?= $producto['id'] ?><br>
                        Cantidad: <?= $producto['cantidad'] ?><br>
                        <a href="?controller=producto&action=carta&eliminarid=<?= $producto['id'] ?>">
                            <img src="img/eliminar.svg" alt="" class="icono">
                        </a>
                    </li>
                <?php endforeach; ?>
                <li class="mt-4"> <!-- Asegura que el botón "Pedir" tenga margen superior -->
                    <a href="?controller=producto&action=pedir" class="btn btn-primary">Pedir</a>
                </li>
            <?php } else { ?>
                <li>No hay productos en el carrito.</li>
            <?php } ?>
        </ul>
    </div>
</div>
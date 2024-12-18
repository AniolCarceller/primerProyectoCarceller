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
            echo "<a href='?controller=producto&action=carta&tipo=$tipo'>" . htmlspecialchars($tipo) . "</a>";
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
                                <div>
                                    <h3><?php echo $producto->GetNombre(); ?></h3>
                                    <p><?php echo $producto->GetDescripcion(); ?></p>
                                    <?php if ($producto->GetOferta() && $producto->GetFechaFinal() >= date('Y-m-d')) { ?>
                                        <p><?php echo ($producto->GetPrecio() * (1 - $producto->GetOferta() / 100)); ?></p>
                                        <p><del><?php echo $producto->GetPrecio(); ?></del></p>
                                    <?php } else { ?>
                                        <p><?php echo $producto->GetPrecio(); ?></p>
                                    <?php } ?>
                                    <a href="?controller=producto&action=carta&id=<?= $producto->GetId() ?>&nombre=<?= $producto->getNombre()?>&precio=<?= $producto->getPrecio()?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg"><g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 12c0 5.799-4.701 10.5-10.5 10.5S1.5 17.799 1.5 12 6.201 1.5 12 1.5 22.5 6.201 22.5 12Zm1.5 0c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12ZM12 5.25a.75.75 0 0 1 .75.75v5.25H18a.75.75 0 0 1 0 1.5h-5.25V18a.75.75 0 0 1-1.5 0v-5.25H6a.75.75 0 0 1 0-1.5h5.25V6a.75.75 0 0 1 .75-.75Z"></path></g><defs><clipPath id="a"><path d="M0 0h24v24H0z"></path></clipPath></defs></svg>
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
                         <?= $producto['nombre']?> x<?= $producto['cantidad'] ?>  <?=$producto['precio']*$producto['cantidad']?> €
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
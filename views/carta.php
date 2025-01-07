<?php
//Muestra toda la carta, permite filtrar por categoria y hacer pedidos
include_once("config/protection.php");
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
    <div class="columnas columnasIzquierda sticky-top d-none d-md-block">
        <ul>
            <li><h2>Filtros</h2></li>
            <li><a href="?controller=producto&action=carta">Todos los productos</a></li>
            <?php
            foreach ($tipos as $tipo) {
                echo "<li><a href='?controller=producto&action=carta&tipo=$tipo'>" . htmlspecialchars($tipo) . "</a></li>";
            }
            ?>
        </ul>
    </div>
    <article class="flex-grow-1 mx-auto overflow-auto d-flex justify-content-center flex-wrap flex-md-nowrap">
        <div id="containerCarta">
            <div class="row m-0 p-0">
                <?php foreach ($productos as $producto) { ?>
                    <div class="articuloCarta col-12 col-md-6 col-xl-6 col-xxl-4 mb-0 p-0">
                        <div class="d-flex justify-content-around m-0 p-0">
                            <div class="productoCarta">
                                <div class="col m-0 p-0">
                                    <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="imagenProductoCarta img-fluid">
                                </div>
                                <div>
                                    <div id="tituloProductoCarta">
                                        <h3><?php echo $producto->GetNombre(); ?></h3>
                                        <a href="?controller=producto&action=carta&id=<?= $producto->GetId() ?>&nombre=<?= $producto->getNombre() ?>&precio=<?= $producto->GetOferta() && $producto->GetFechaFinal() >= date('Y-m-d') ? number_format($producto->GetPrecio() * (1 - $producto->GetOferta() / 100), 2) : $producto->getPrecio() ?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg">
                                                <g clip-path="url(#a)">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5 12c0 5.799-4.701 10.5-10.5 10.5S1.5 17.799 1.5 12 6.201 1.5 12 1.5 22.5 6.201 22.5 12Zm1.5 0c0 6.627-5.373 12-12 12S0 18.627 0 12 5.373 0 12 0s12 5.373 12 12ZM12 5.25a.75.75 0 0 1 .75.75v5.25H18a.75.75 0 0 1 0 1.5h-5.25V18a.75.75 0 0 1-1.5 0v-5.25H6a.75.75 0 0 1 0-1.5h5.25V6a.75.75 0 0 1 .75-.75Z"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="a">
                                                        <path d="M0 0h24v24H0z"></path>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </a>
                                    </div>
                                    <p><?php echo $producto->GetDescripcion(); ?></p>
                                    <?php if ($producto->GetOferta() && $producto->GetFechaFinal() >= date('Y-m-d')) { ?>
                                        <p><del><?php echo number_format($producto->GetPrecio(), 2); ?> €</del> <?php echo number_format($producto->GetPrecio() * (1 - $producto->GetOferta() / 100), 2); ?> €</p>                                    
                                    <?php } else { ?>
                                        <p><?php echo number_format($producto->GetPrecio(), 2); ?> €</p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </article>


    <div class="columnas columnasDerecha d-flex d-md-flex flex-column align-items-center sticky-top">
        <ul>
            <h2>Mi pedido</h2>
            <?php 
            if (!empty($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $productoId => $producto): ?>
                    <li class="pedidoProductos mb-2">
                        <?= $producto['nombre']?> x<?= $producto['cantidad'] ?>  <?=$producto['precio']*$producto['cantidad']?> €
                        <a href="?controller=producto&action=carta&eliminarid=<?= $producto['id'] ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.47 4.47a.75.75 0 0 1 1.06 0L12 10.94l6.47-6.47a.75.75 0 1 1 1.06 1.06L13.06 12l6.47 6.47a.75.75 0 1 1-1.06 1.06L12 13.06l-6.47 6.47a.75.75 0 0 1-1.06-1.06L10.94 12 4.47 5.53a.75.75 0 0 1 0-1.06Z"></path></svg>
                        </a>
                    </li>
                <?php endforeach; ?>
                <li>
                    <div class="botonFondo">                  
                        <a href="?controller=producto&action=pedir" class="boton">Pedir</a>
                    </div>
                </li>
            <?php } else { ?>
                <li>No hay productos en el carrito.</li>
            <?php } ?>
        </ul>
    </div>

</div>
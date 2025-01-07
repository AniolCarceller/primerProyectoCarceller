<?php
//permite acabar el pedido que se ha realizado en la pagina de carta y mandarlo a la base de datos
include_once("config/protection.php");
include_once("config/carrito.php");
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_POST['ubicacion']) && isset($_POST['precio'])){
        $ubicacion = $_POST['ubicacion'];
        $precio = $_POST['precio'];
        $dao->insertProductos(1, $ubicacion,  $precio);
        unset($_SESSION['carrito']);
        header("location: ". url);
    }
}
?>
<div id="pedido">
    <div id="productosPedido">
    <ul>

        <h2>Resumen de tu pedido</h2>
        <?php 
        if(isset($_SESSION['carrito'])){
            $total=0;
            foreach ($_SESSION['carrito'] as $productoId => $producto){ ?>
                <li><?= $producto['nombre'] ?></li>
                <li>Cantidad: <?= $producto['cantidad'] ?></li>
                <li>Precio: <?php 
                    foreach ($productos as $productoBD) {
                        if ($productoBD->getId() == $producto['id']) {
                            if ($productoBD->GetOferta() && $productoBD->GetFechaFinal() >= date('Y-m-d')) {
                                $precioConDescuento = $productoBD->GetPrecio() * (1 - $productoBD->GetOferta() / 100);
                                echo '<del>' . number_format($productoBD->GetPrecio(), 2) . ' €</del>';
                                echo ' ' . number_format($precioConDescuento, 2) . ' €';
                                $total += round($precioConDescuento * $producto['cantidad'], 2);
                            } else {
                                echo number_format($productoBD->GetPrecio(), 2) . ' €';
                                $total += round($productoBD->GetPrecio() * $producto['cantidad'], 2);
                            }
                        }
                    }?>
                </li>
                    
            <?php } echo("<li>Total: ". $total ."€</li>");?>
            <form method="POST">
                <div id="inputPedido">
                    <input type="text" name="ubicacion" placeholder="Ubicacion" id="ubicacion" required>
                </div>
                <input type="hidden" name="precio" value="<?= $total ?>">
                <div class="botonFondo">
                    <input type="submit" value="Pagar" class="boton">
                </div>
            </form>
        </ul>
    </div>
    <?php } ?>
</div>
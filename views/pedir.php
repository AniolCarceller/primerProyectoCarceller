<?php

include_once("config/carrito.php");

if(isset($_POST['ubicacion']) && isset($_POST['precio'])){
    $ubicacion = $_POST['ubicacion'];
    if(isset($_POST['descuento'])) $codigo_descuento = $_POST['descuento'];
    else $codigo_descuento=0;
    $precio = $_POST['precio'];
    $productosInsert = $dao->insertProductos(1, $ubicacion, $codigo_descuento, $precio);
}
else{
    echo("Pon la ubicacion");
}

?>
<ul>
    <div>
        <?php 
        if(isset($_SESSION['carrito'])){
            $total=0;
            foreach ($_SESSION['carrito'] as $productoId => $producto){ ?>
                <li>
                    ID: <?= $producto['id'] ?><br>
                    Cantidad: <?= $producto['cantidad'] ?><br>
                    Precio: <?php 
                    foreach ($productos as $productoBD) {
                        if($productoBD->getId()==$producto['id']){
                            echo($productoBD->getPrecio()*$producto['cantidad']);
                            $total+=$productoBD->getPrecio()*$producto['cantidad'];               
                        }
                    }?>
                </li>
            <?php }
        echo("Total: ". $total ."€");?>
            
        <?php } ?>
        <form method="POST">
            <input type="text" name="ubicacion" placeholder="Ubicacion">
            <input type="text" name="descuento" placeholder="Codigo de descuento">
            <input type="hidden" name="precio" value="<?= $total ?>">
            <input type="submit" value="Pagar">
        </form>
    </div>
</ul>
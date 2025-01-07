<?php
//Muestra la pagina principal con un banner y 3 secciones de productos
include_once("models/DatabaseAccessObjectProductos.php");
include_once("models/Productos/Comida.php");
?>
    <article id="bannerColor">
        <div id="banner">
            <div>
                <h1>Las <strong>Mejores Pizzas</strong> de España te esperan: </h1>
                <div id="alignButton">
                    <div class="botonFondo">
                        <a href="http://primerproyectocarceller.com/?controller=producto&action=carta" class="boton">Nuestra carta</a>
                    </div>
                </div>
            </div>
            <img src="/img/imagenbanner.png" alt="" class="img-fluid d-none d-xxl-block">
        </div>
    </article>

    <div class="d-flex justify-content-center">
        <div class="productosContainer">
            <h1 class="titulo">Pizzas</h1>
            <article class="productosInicio container d-grid gap-4">
                <div class="row g-4">
                    <?php
                        $dao = new DatabaseAccessObjectProductos();
                        $productos = $dao->getAllProductos("pizza");
                        $productosLimitados = array_slice($productos, 0, 5);
                        foreach ($productos as $producto){
                    ?>
                    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
                        <a href="?controller=producto&action=carta">
                            <div class="producto">
                                <div class="imagenAlturaFondo">
                                    <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="imagenProducto">
                                </div>
                                <div class="textoProducto">
                                    <h3><?php echo $producto->GetNombre(); ?></h3>
                                    <p><?php echo $producto->GetDescripcion(); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </article>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="productosContainer">
            <h1 class="titulo">Raciones</h1>
            <article class="productosInicio container d-grid gap-4">
                <div class="row g-4">
                    <?php
                        $dao = new DatabaseAccessObjectProductos();
                        $productos = $dao->getAllProductos("racion");
                        $productosLimitados = array_slice($productos, 0, 5);
                        foreach ($productos as $producto){
                    ?>
                    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
                        <a href="?controller=producto&action=carta">
                            <div class="producto">
                                <div class="imagenAlturaFondo">
                                    <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="imagenProducto">
                                </div>
                                <div class="textoProducto">
                                    <h3><?php echo $producto->GetNombre(); ?></h3>
                                    <p><?php echo $producto->GetDescripcion(); ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                        
                    <?php } ?>
                </div>
            </article>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        <div class="productosContainer">
            <h1 class="titulo">Bebidas</h1>
            <article class="productosInicio container d-grid gap-4">
                <div class="row g-4">
                    <?php
                        $dao = new DatabaseAccessObjectProductos();
                        $productos = $dao->getAllProductos("bebida");
                        $productosLimitados = array_slice($productos, 0, 5);
                        foreach ($productos as $producto){
                    ?>
                    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 d-flex justify-content-center">
                        <div class="producto">
                            <div class="imagenAlturaFondo">
                                <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="imagenProducto">
                            </div>
                            <div class="textoProducto">
                                <h3><?php echo $producto->GetNombre(); ?></h3>
                                <p><?php echo $producto->GetDescripcion(); ?></p>
                            </div>
                        </div>
                    </div>
                    </a>
                    <?php } ?>
                </div>
            </article>
        </div>
    </div>
</body>
</html>
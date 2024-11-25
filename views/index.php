<?php
include_once("models/DatabaseAccessObjectProductos.php");

// Incluir las clases de productos que vayas a manejar (en este caso, 'Product' y 'Comida')
include_once("models/Productos/Comida.php");
?>
<body>
    <article id="bannerColor">
        <div id="banner">
            <div id="bannerLinkCarta">
                <h1><strong>Prueba</strong> nuestras mejores pizzas</h1>
                <a href="">Nuestra carta</a>
            </div>
            <img src="/img/imagenbanner.png" alt="" class="img-fluid">
        </div>
    </article>
    <h1>Pizzas</h1>
    <div class="d-flex justify-content-center">
    <article class="productosInicio container d-flex justify-content-center">
        <div class="row">
            <!-- Limitar a los primeros 5 productos -->
            <?php
                $cont=0;
                foreach ($productos as $producto){
                    if($producto->getTipo()=="pizza"){
            ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <!-- Imagen del producto -->
                        <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="img-fluid">
                        
                        <!-- Nombre del producto -->
                        <h3><?php echo $producto->GetNombre(); ?></h3>
                        
                        <!-- Descripción del producto -->
                        <p><?php echo $producto->GetDescripcion(); ?></p>
                    </div>
                    <?$cont++?>
                </div>
            <?php }} ?>
        </div>
    </article>
    </div>
    <h1>Raciones</h1>
    <div class="d-flex justify-content-center">
    <article class="productosInicio container d-flex justify-content-center">
        <div class="row">
            <!-- Limitar a los primeros 5 productos -->
            <?php
                $cont=0;
                foreach ($productos as $producto){
                    if($producto->getTipo()=="racion"){
            ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <!-- Imagen del producto -->
                        <img src="<?php echo $producto->GetImagen(); ?>" alt="" class="img-fluid">
                        
                        <!-- Nombre del producto -->
                        <h3><?php echo $producto->GetNombre(); ?></h3>
                        
                        <!-- Descripción del producto -->
                        <p><?php echo $producto->GetDescripcion(); ?></p>
                    </div>
                    <?$cont++?>
                </div>
            <?php }} ?>
        </div>
    </article>
    </div>
    <article id="">
        <div>
            <img src="" alt="">
            <div>
                <h2>Encontrar la carta</h2>
                <p>Accede a la carta mediante el header o mediante este enlace</p>
                <a href="">Nuestra carta</a>
            </div>
            <div>
                <h2>Pagos 100% seguros</h2>
            </div>
        </div>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
include_once("models/DatabaseAccessObjectProductos.php");

// Incluir las clases de productos que vayas a manejar (en este caso, 'Product' y 'Comida')
include_once("models/Productos/Comida.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallafood</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
</head>
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
                $productosLimitados = array_slice($productos, 0, 5); // Solo tomamos los primeros 5 productos
                foreach ($productosLimitados as $producto):
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
                </div>
            <?php endforeach; ?>
        </div>
    </article>
    </div>
    <h1>Raciones</h1>
    <div class="d-flex justify-content-center">
        <article class="productosInicio container d-flex justify-content-center">
            <div class="row">
                <!-- Columna 1 -->
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <img src="/img/racion1.png" alt="" class="img-fluid">
                        <h3>Pops de pollo</h3>
                        <p>Bocaditos de pechuga de pollo empanado. Elige tu salsa favorita para dipear.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <img src="/img/racion2.png" alt="" class="img-fluid">
                        <h3>Cheese & Bacon Fries</h3>
                        <p>Nuestras patatas con bacon crispy y deliciosa salsa cheddar.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <img src="/img/racion3.png" alt="" class="img-fluid rounded">
                        <h3>Hot Cheddar</h3>
                        <p>Triángulos de queso Cheddar con un toque picante de chile rojo (5uds). Elige tu salsa favorita para dipear.</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <img src="/img/racion4.png" alt="" class="img-fluid rounded">
                        <h3>Gouda Rings</h3>
                        <p>Aros de queso Gouda (5 uds). Elige tu salsa favorita para dipear</p>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="producto">
                        <img src="/img/racion5.png" alt="" class="img-fluid rounded">
                        <h3>Patatas Grill</h3>
                        <p>Crujientes patatas horneadas. Elige tu salsa preferida para dipear.</p>
                    </div>
                </div>
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
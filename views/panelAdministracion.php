<?php
if($_SESSION['nombre']!="admin"){
    header("Location: ?controller=producto&action=index");
}
?>
<script src="api/api.js"></script>
<h3>Crear usuario</h3>
    <form id="usuarioNuevo">
        <label for="nombreApellidos">Nombre y Apellidos:</label>
        <input type="text" name="nombreApellidos" id="nombreApellidos">
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo">
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" id="contraseña">
        <button type="button" onclick="createUser()">Crear Usuario</button>
    </form>

    <h3>Lista de Usuarios</h3>
    <table id="usuarios">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre y Apellidos</th>
                <th>Correo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>

    <h3>Crear pedido</h3>
    <form id="pedidoNuevo">
        <label for="userid">User ID:</label>
        <input type="number" name="userid" id="userid">
        <label for="ubicacion">Ubicación:</label>
        <input type="text" name="ubicacion" id="ubicacionform">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio">
        <button type="button" onclick="createPedido()">Crear Pedido</button>
    </form>

    <h3>Lista de Pedidos</h3>
    <table id="pedidos">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Ubicación</th>
                <th>Precio</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
<h3>Crear producto</h3>
<form id="productoNuevo">
    <input type="text" id="nombre" placeholder="Nombre"/>
    <input type="text" id="descripcion" placeholder="Descripción"/>
    <input type="text" id="ingredientes" placeholder="Ingredientes"/>
    <input type="number" id="precioProducto" placeholder="Precio"/>
    <input type="text" id="imagen" placeholder="Imagen"/>
    <input type="text" id="tipo" placeholder="Tipo"/>
    <button type="button" onclick="createProducto()">Crear Producto</button>
</form>
<table id="productos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Ingredientes</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Tipo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
</body>
</html>
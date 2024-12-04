
<?php
if (isset($_POST['nombre']) && isset($_POST['correo'])) {
    /*if (!filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Correo inválido");
    }
    else{*/
    $nombre= $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    if($contraseña){
        $contraseñaEncriptada = password_hash($contraseña, PASSWORD_BCRYPT);
    }
    else{
        $contraseñaEncriptada = null;
    }
    $usuariosUpdate = $dao->updateUsers($_SESSION['usuario_id'], $nombre, $correo, $contraseñaEncriptada);;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;
    //}
}
?>
<form method="POST">
    <label for="">Nombre y Apellidos</label>
    <input type="text" name="nombre" value="<?=$_SESSION['nombre']?>">
    <label for="">Correo</label>
    <input type="text" name="correo" value="<?=$_SESSION['correo']?>">
    <label for="">Contraseña</label>
    <input type="text" name="contraseña">
    <input type="submit" value="Actualizar">
</form>
<p>Pedidos:</p>
<?php
?>
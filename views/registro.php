<?php
    if(isset($_POST['nombreApellidos']) && isset($_POST['correo']) && isset($_POST['contraseña'])){
        $nombreApellidos = $_POST['nombreApellidos'];
        $correo = $_POST['correo'];
        $contraseña = $_POST['contraseña'];
        $contraseñaEncriptada = password_hash($contraseña, PASSWORD_BCRYPT);
        $usuariosInsert = $dao->insertUsers($nombreApellidos, $correo, $contraseñaEncriptada);
        header("location: ". url ."?controller=producto&action=iniciarsession");
    }
    else{
        echo("Completa todos los campos");
    }
    
?>
<div>
    <form method="POST">
        <input type="text" name="nombreApellidos" placeholder="Nombre y apellidos">
        <input type="text" name="correo" placeholder="Direccion de e-mail">
        <input type="password" name="contraseña" placeholder="Contraseña">
        <input type="submit" value="Crear una cuenta">
    </form>
</div>
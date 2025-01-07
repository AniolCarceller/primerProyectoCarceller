<?php
//Redirige al inicio de sesion si el usuario intenta acceder a una pagina que requiere un usuario
if(!isset($_SESSION['usuario_id'])){
    header("location: ". url_iniciarSesion);
}
?>
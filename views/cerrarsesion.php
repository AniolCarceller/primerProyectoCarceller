<?php
if (isset($_SESSION['usuario_id']) && isset($_SESSION['nombre'])) {
    unset($_SESSION['usuario_id']);
    unset($_SESSION['nombre']);
    header("location: ". url);
}
session_destroy();
exit();
?>

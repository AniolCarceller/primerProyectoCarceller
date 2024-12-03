<?php
if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];

    // Obtener todos los usuarios
    $usuarios = $dao->getAllUsers();

    if ($usuarios) {
        $usuarioEncontrado = null;

        foreach ($usuarios as $usuario) {
            if ($usuario['correo'] === $correo) {
                $usuarioEncontrado = $usuario;
                break;
            }
        }

        if ($usuarioEncontrado) {
            if (password_verify($contraseña, $usuarioEncontrado['contraseña'])) {
                session_start(); 
                $_SESSION['usuario_id'] = $usuarioEncontrado['user_id'];
                $_SESSION['nombre'] = $usuarioEncontrado['nombre_apellidos'];
                $_SESSION['correo'] = $usuarioEncontrado['correo'];
                header("Location: " . url . "producto/index");
                exit;
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró ningún usuario con ese correo.";
        }
    } else {
        echo "No hay usuarios registrados.";
    }
} else {
    echo "Por favor, completa todos los campos.";
}
?>
<div>
    <form method="POST">
        <input type="text" name="correo" placeholder="Direccion de e-mail" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <input type="submit" value="Iniciar Sesión">
    </form>
</div>
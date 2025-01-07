<!--Permite inciar sesion y acceder a la pagina de registro-->
<div id="formularioLogin" class="d-flex justify-content-center align-items-end align-items-sm-center">
    <div id="form" class="d-flex flex-column bg-white">
        <div class="m-4">
            <div id="linkFormulario" class="pb-2">
                <a href="?controller=producto&action=index"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg"><g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.03 4.72a.75.75 0 0 1 0 1.06l-5.47 5.47h20.69a.75.75 0 0 1 0 1.5H2.56l5.47 5.47a.75.75 0 1 1-1.06 1.06L.22 12.53a.75.75 0 0 1 0-1.06l6.75-6.75a.75.75 0 0 1 1.06 0Z"></path></g><defs><clipPath><path d="M0 0h24v24H0z"></path></clipPath></defs></svg></a>
            </div>
            <form method="POST">
                <div>
                    <h1>¡Te damos la bienvenida!</h1>
                    <div class="text-center">
                        <?php
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                if (isset($_POST['correo']) && isset($_POST['contraseña'])) {
                                    $correo = $_POST['correo'];
                                    $contraseña = $_POST['contraseña'];
                                    $usuarios = $daoUsers->usuarioExiste($correo);
                                    $usuariosGet = $daoUsers->getAllUsers($correo);
                                    foreach ($usuariosGet as $usuario) {
                                        $usuarioEncontrado = $usuario;
                                        break;
                                    }
                                    if ($usuarios) {
                                        
                                        if (password_verify($contraseña, $usuarioEncontrado['contraseña'])) {
                                            session_start(); 
                                            $_SESSION['usuario_id'] = $usuarioEncontrado['user_id'];
                                            $_SESSION['nombre'] = $usuarioEncontrado['nombre_apellidos'];
                                            $_SESSION['correo'] = $usuarioEncontrado['correo'];
                                            header("Location: " . url . "producto/index");
                                            exit;
                                        } else {
                                            echo "<p class='error'>Contraseña incorrecta.</p>";
                                        }
                                    } else {
                                        echo "<p class='error'>No se encontró ningún usuario con ese correo.</p>";
                                    }
                                } else {
                                    echo "<p class='error'>Por favor, completa todos los campos.</p>";
                                }
                            }
                        ?>
                        <input type="email" name="correo" placeholder="Dirección de e-mail" required>
                        <input type="password" name="contraseña" placeholder="Contraseña" required>
                    </div>
                    <div class="text-center">
                        <a href="?controller=producto&action=registro" id="linkRegistro" class="text-align-center">¿No tienes cuenta? Crea una aqui.</a>
                    </div>
                    <div class="botonFondo w-100">
                        <input type="submit" value="Iniciar Sesión" class="boton">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

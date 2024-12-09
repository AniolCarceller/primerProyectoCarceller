<div id="formularioLogin" class="d-flex justify-content-center align-items-end align-items-sm-center">
    <div id="form" class="d-flex flex-column bg-white rounded shadow">
        <form method="POST">
            <div id="linkFormulario" class="d-flex align-items-center">
                <a href="" class="d-flex justify-content-start"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg"><g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.03 4.72a.75.75 0 0 1 0 1.06l-5.47 5.47h20.69a.75.75 0 0 1 0 1.5H2.56l5.47 5.47a.75.75 0 1 1-1.06 1.06L.22 12.53a.75.75 0 0 1 0-1.06l6.75-6.75a.75.75 0 0 1 1.06 0Z"></path></g><defs><clipPath ><path d="M0 0h24v24H0z"></path></clipPath></defs></svg></a>
                <a href="" class="d-flex justify-content-end"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M4.47 4.47a.75.75 0 0 1 1.06 0L12 10.94l6.47-6.47a.75.75 0 1 1 1.06 1.06L13.06 12l6.47 6.47a.75.75 0 1 1-1.06 1.06L12 13.06l-6.47 6.47a.75.75 0 0 1-1.06-1.06L10.94 12 4.47 5.53a.75.75 0 0 1 0-1.06Z"></path></svg></a>
            </div>
            <div class="d-flex flex-column justify-content-center">
                <h1>Te damos la bienvenida!</h1>
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
                                    echo "<p>Contraseña incorrecta.</p>";
                                }
                            } else {
                                echo "<p>No se encontró ningún usuario con ese correo.</p>";
                            }
                        } else {
                            echo "<p>No hay usuarios registrados.</p>";
                        }
                    } else {
                        echo "<p>Por favor, completa todos los campos.</p>";
                    }
                ?>
                <input type="text" name="correo" placeholder="Direccion de e-mail" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <input type="submit" value="Iniciar Sesión">
            </div>
        </form>
    </div>
</div>

<!--permite poder registrar un nuevo usuario-->

<div id="formularioLogin" class="d-flex justify-content-center align-items-end align-items-sm-center">
    <div id="form" class="d-flex flex-column bg-white">
        <div class="m-4">
            <div id="linkFormulario" class="pb-2">
                <a href="?controller=producto&action=index"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#29363d" part="inner-svg"><g clip-path="url(#a)"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.03 4.72a.75.75 0 0 1 0 1.06l-5.47 5.47h20.69a.75.75 0 0 1 0 1.5H2.56l5.47 5.47a.75.75 0 1 1-1.06 1.06L.22 12.53a.75.75 0 0 1 0-1.06l6.75-6.75a.75.75 0 0 1 1.06 0Z"></path></g><defs><clipPath><path d="M0 0h24v24H0z"></path></clipPath></defs></svg></a>
            </div>
            <form method="POST">
                <div>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        if(isset($_POST['nombreApellidos']) && isset($_POST['correo']) && isset($_POST['contraseña'])){
                            $nombreApellidos = $_POST['nombreApellidos'];
                            $correo = $_POST['correo'];
                            $contraseña = $_POST['contraseña'];
                            if ($daoUsers->usuarioExiste($correo)) {
                                echo "<p class='error'>El correo electrónico ya está registrado</p>";
                            }
                            else{
                                $contraseñaEncriptada = password_hash($contraseña, PASSWORD_BCRYPT);
                                $usuariosInsert = $daoUsers->insertUsers($nombreApellidos, $correo, $contraseñaEncriptada);
                                header("location: ". url ."?controller=producto&action=iniciarsesion");
                            }
                        }
                    }
                    
                ?>
                    <h1>Unete a Wallafood</h1>
                    <div class="text-center">
                        <input type="text" name="nombreApellidos" placeholder="Nombre y Apellidos" required>
                        <input type="email" name="correo" placeholder="Dirección de e-mail" required>
                        <input type="password" name="contraseña" placeholder="Contraseña" required>
                    </div>
                    <div class="text-center">
                        <a href="?controller=producto&action=iniciarsesion" id="linkRegistro" class="text-align-center">Tienes una cuenta? Incia sesión aqui.</a>
                    </div>
                    <div class="botonFondo w-100">
                        <input type="submit" value="Crear una cuenta" class="boton">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

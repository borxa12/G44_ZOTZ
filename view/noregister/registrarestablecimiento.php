<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    // loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    loadclasses("controller","ControladorEstablecimiento.php");
    if(isset($_SESSION['tipo'])) {
        switch ($_SESSION['tipo']) {
            case 'org':
                loadclasses("menus","menuorganizador.html");
                break;
            case 'jpop':
                loadclasses("menus","menujuradopopular.html");
                break;
            case 'jpro':
                loadclasses("menus","menujuradoprofesional.html");
                break;
            case 'est':
                loadclasses("menus","menuestablecimiento.html");
                break;
            // default:
            //     loadclasses("menus","nomenu.html");
            //     break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
?>
            <h1>Registrar Establecimiento</h1>
                <form name="registroestablecimiento" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombreestablecimiento">Nombre</label>
                            <input type="text" name="nombreestablecimiento" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="direccionestablecimiento">Dirección</label>
                            <input type="text" name="direccionestablecimiento" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="horarioestablecimiento">Horario</label>
                            <input type="text" name="horarioestablecimiento" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="telefonoestablecimiento">Teléfono</label>
                            <input type="tel" pattern="^[9|8|7|6]\d{8}$" name="telefonoestablecimiento"
                                title="Número de 9 dígitos que empieza por 6, 7, 8 o 9" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="webestablecimiento">Web</label>
                            <input type="text" name="webestablecimiento" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="loginestablecimiento">Login</label>
                            <input type="text" name="loginestablecimiento" require/>
                            <br></br>
                            </div>
                        <div>
                            <label for="emailestablecimiento">Email</label>
                            <input type="email" name="emailestablecimiento"
                                title="example@example.com" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordestablecimiento">Password</label>
                            <input type="password" pattern="[^ñÑ´`áéíóúàèìòù]{1,45}"
                                name="passwordestablecimiento" title="Letras números y caracteres especiales como - _ @ #" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="repetirpasswordestablecimiento">Repetir Password</label>
                            <input type="password" pattern="[^ñÑ´`áéíóúàèìòù]{1,45}"
                                name="repetirpasswordestablecimiento" require/>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descripción</label>
                            <textarea rows="4" name="descripcionestablecimiento"></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button name="altaest" type="submit" class="btn btn-default button">Dar de alta</button> <!-- formaction="http://localhost/Zotz/index.php" -->
                    <button type="submit" formaction="establecimientos.php" class="btn btn-default button">Volver</button>
                </form>

                <?php
                    if(isset($_POST['altaest'])) {
                        if($_POST['nombreestablecimiento'] == "" || $_POST['direccionestablecimiento'] == "" ||
                            $_POST['horarioestablecimiento'] == "" || $_POST['telefonoestablecimiento'] == "" ||
                            $_POST['webestablecimiento'] == "" || $_POST['loginestablecimiento'] == "" ||
                            $_POST['emailestablecimiento'] == "" || $_POST['passwordestablecimiento'] == "" ||
                            $_POST['repetirpasswordestablecimiento'] == "" || $_POST['descripcionestablecimiento'] == "") {
                                echo '<script> alert("Debe rellenar todos los campos");</script>';
                                echo '<script> window.location="http://localhost/Zotz/view/noregister/registrarestablecimiento.php";</script>';
                        } else if(strcmp($_POST['passwordestablecimiento'],$_POST['repetirpasswordestablecimiento'])) {
                            echo '<script> alert("Las contraseñas no coinciden");</script>';
                            echo '<script> window.location="./registrarestablecimiento.php";</script>';
                        } else {
                            if (altaEstablecimiento($_POST['loginestablecimiento'],$_POST['passwordestablecimiento'],
                                $_POST['emailestablecimiento'],$_POST['nombreestablecimiento'],$_POST['direccionestablecimiento'],
                                $_POST['telefonoestablecimiento'],$_POST['webestablecimiento'],$_POST['horarioestablecimiento'],
                                $_POST['descripcionestablecimiento'])) {
                                    header("Location: http://localhost/Zotz/view/noregister/registro_login.php");
                                } else {
                                    echo '<script> alert("O login xa existe. Tenteo con outro.");</script>';
                                    echo '<script> window.location="./registrarestablecimiento.php";</script>';
                                }
                        }
                    }
                ?>

            <div class="cleaner"></div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1"></div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

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
                            <input type="text" name="nombreestablecimiento" maxlength=90 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="direccionestablecimiento">Dirección</label>
                            <input type="text" name="direccionestablecimiento" maxlength=90 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="horarioestablecimiento">Horario</label>
                            <input type="text" name="horarioestablecimiento" maxlength=15 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="telefonoestablecimiento">Teléfono</label>
                            <input type="tel" maxlength=20 pattern=[0-9]{9,45} name="telefonoestablecimiento"
                                title="Número de 9 dígitos que empieza por 6, 7, 8 o 9" required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="webestablecimiento">Web</label>
                            <input type="text" name="webestablecimiento" maxlength=45/>
                            <br></br>
                        </div>
                        <div>
                            <label for="loginestablecimiento">Login</label>
                            <input type="text" name="loginestablecimiento" maxlength=20 required/>
                            <br></br>
                            </div>
                        <div>
                            <label for="emailestablecimiento">Email</label>
                            <input type="email" maxlength=50 name="emailestablecimiento"
                                title="example@example.com" required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordestablecimiento">Password</label>
                            <input type="password" maxlength=45 pattern="[^ñÑ´`áéíóúàèìòù]{1,45}"
                                name="passwordestablecimiento" title="Letras números y caracteres especiales como - _ @ #" required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="repetirpasswordestablecimiento">Repetir Password</label>
                            <input type="password" maxlength=45 pattern="[^ñÑ´`áéíóúàèìòù]{1,45}"
                                name="repetirpasswordestablecimiento" required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descripción</label>
                            <textarea rows="4" maxlength=200 name="descripcionestablecimiento" required></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button name="altaest" type="submit" class="btn btn-default button">Dar de alta</button> <!-- formaction="http://localhost/Zotz/index.php" -->
                    <button type="submit" formaction="establecimientos.php" class="btn btn-default button">Volver</button>
                </form>

                <?php
                    if(isset($_POST['altaest'])) {
                    //     if($_POST['nombreestablecimiento'] == "" || $_POST['direccionestablecimiento'] == "" ||
                    //         $_POST['horarioestablecimiento'] == "" || $_POST['telefonoestablecimiento'] == "" ||
                    //         $_POST['webestablecimiento'] == "" || $_POST['loginestablecimiento'] == "" ||
                    //         $_POST['emailestablecimiento'] == "" || $_POST['passwordestablecimiento'] == "" ||
                    //         $_POST['repetirpasswordestablecimiento'] == "" || $_POST['descripcionestablecimiento'] == "") {
                    //             echo '<script> alert("Debe rellenar todos los campos");</script>';
                    //             echo '<script> window.location="http://localhost/Zotz/view/noregister/registrarestablecimiento.php";</script>';
                    //     } else
                        if(strcmp($_POST['passwordestablecimiento'],$_POST['repetirpasswordestablecimiento'])) {
                            echo '<script> alert("Las contraseñas no coinciden");</script>';
                            echo '<script> window.location="./registrarestablecimiento.php";</script>';
                        } else {
                            if (altaEstablecimiento($_POST['loginestablecimiento'],$_POST['passwordestablecimiento'],
                                $_POST['emailestablecimiento'],$_POST['nombreestablecimiento'],$_POST['direccionestablecimiento'],
                                $_POST['telefonoestablecimiento'],$_POST['webestablecimiento'],$_POST['horarioestablecimiento'],
                                $_POST['descripcionestablecimiento'])) {
                                    header("Location: ./registro_login.php");
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

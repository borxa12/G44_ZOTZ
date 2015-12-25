<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
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
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
?>
            <h1>Rexistrar Establecemento</h1>
                <form name="registroestablecimiento" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombreestablecimiento">Nome</label>
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
                            <label for="passwordestablecimiento">Contrasinal</label>
                            <input type="password" maxlength=45 pattern="[^ñÑ´`áéíóúàèìòù]{1,45}"
                                name="passwordestablecimiento" title="Letras números y caracteres especiales como - _ @ #" required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="repetirpasswordestablecimiento">Repetir Contrasinal</label>
                            <input type="password" maxlength=45 pattern="[^ñÑ´`áéíóúàèìòù]{1,45}"
                                name="repetirpasswordestablecimiento" required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descrición</label>
                            <textarea rows="4" maxlength=200 name="descripcionestablecimiento" required></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button name="altaest" type="submit" class="btn btn-default button">Dar de alta</button>
                    <button type="submit" formaction="establecimientos.php" class="btn btn-default button">Voltar</button>
                </form>

                <?php
                    if(isset($_POST['altaest'])) {
                        if(strcmp($_POST['passwordestablecimiento'],$_POST['repetirpasswordestablecimiento'])) {
                            echo '<script> alert("Las contrase\u00f1as no coinciden");</script>';
                            echo '<script> window.location="./registrarestablecimiento.php";</script>';
                        } else {
                            if (altaEstablecimiento(htmlentities($_POST['loginestablecimiento'],ENT_QUOTES),md5(htmlentities($_POST['passwordestablecimiento'],ENT_QUOTES)),
                                htmlentities($_POST['emailestablecimiento'],ENT_QUOTES),htmlentities($_POST['nombreestablecimiento'],ENT_QUOTES),
                                htmlentities($_POST['direccionestablecimiento'],ENT_QUOTES), htmlentities($_POST['telefonoestablecimiento'],ENT_QUOTES),
                                htmlentities($_POST['webestablecimiento'],ENT_QUOTES),htmlentities($_POST['horarioestablecimiento'],ENT_QUOTES),
                                htmlentities($_POST['descripcionestablecimiento'],ENT_QUOTES))) {
                                    header("Location: ./registro_login.php");
                                } else {
                                    echo '<script> alert("O login xa existe. Intenteo con outro.");</script>';
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

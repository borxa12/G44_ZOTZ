<?php
    session_start();
    ob_start();
    ini_set('display_errors',1);

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");

    if($_SESSION['tipo'] != 'est') {
        header("Location: ../../index.php");
    } else {
        $establecimiento = recuperarDatosEstablecimiento($_SESSION['login']);
?>

        <h1>Modificar Establecemento</h1>
        <div class="cleaner_h40"></div>
        <br></br>

        <form name="modificarestablecimiento" method="post">
            <div id=templatemo_form>
                <div>
                    <label for="nombre">Nome</label>
                    <input type = "text" name="nombre" placeholder="Nome do establecemento" maxlength=90 value="<?php echo $establecimiento['nombre'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type = "text" name="direccion" placeholder="Dirección do establecemento" maxlength=90 value="<?php echo $establecimiento['direccion'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="telefono">Teléfono</label>
                    <input type="tel" name="telefono" placeholder="Teléfono do establecemento" maxlength=20 value="<?php echo $establecimiento['telefono'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="horario">Horario</label>
                    <input type="tel" name="horario" placeholder="Horario do establecemento" maxlength=15 value="<?php echo $establecimiento['horario'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="web">Web</label>
                    <input type = "text" name="web" placeholder="Web do establecemento" maxlength=45 value="<?php echo $establecimiento['web'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email do establecemento" maxlength=50 value="<?php echo $establecimiento['email'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="password">Contrasinal</label>
                    <input type="password" name="password" placeholder="Novo contrasinal" maxlength=45 value="<?php echo $establecimiento['password'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="confirmarpassword">Repetir Contrasinal</label>
                    <input type="password" name="confirmarpassword" placeholder="Repetir o novo contrasinal" maxlength=45 value="<?php echo $establecimiento['password'];?>"/>
                    <br></br>
                </div>
                <div>
                    <label for="descripcion">Descrición</label>
                    <textarea rows="4" cols="50" name="descripcion" maxlength=200  placeholder="Nova descrición"><?php echo $establecimiento['descripcion'];?></textarea>
                    <br></br>
                </div>
            </div>
            <button name="modificar" type="submit" class="btn btn-default button">Gardar</button>
            <button type="submit" formaction="modificarestablecimiento.php" class="btn btn-default button">Cancelar</button>
        </form>

        <?php
            if(isset($_POST['modificar'])) {
                if($_POST['nombre'] == "" || $_POST['direccion'] == "" ||
                    $_POST['horario'] == "" || $_POST['telefono'] == "" ||
                    $_POST['web'] == "" ||
                    $_POST['email'] == "" || $_POST['password'] == "" ||
                    $_POST['confirmarpassword'] == "" || $_POST['descripcion'] == "") {
                        echo '<script> alert("Debe rellenar todos los campos");</script>';
                        echo '<script> window.location="./cambiardatosestablecimiento.php";</script>';
                } else if(strcmp($_POST['password'],$_POST['confirmarpassword'])) {
                    echo '<script> alert("Las contrase\u00f1as no coinciden");</script>';
                    echo '<script> window.location="./cambiardatosestablecimiento.php";</script>';
                } else {
                    if (modificarDatosEstablecimiento(htmlentities($_SESSION['login'],ENT_QUOTES),htmlentities($_POST['password'],ENT_QUOTES),
                        htmlentities($_POST['email'],ENT_QUOTES),htmlentities($_POST['nombre'],ENT_QUOTES),htmlentities($_POST['direccion'],ENT_QUOTES),
                        $_POST['telefono'],htmlentities($_POST['web'],ENT_QUOTES),htmlentities($_POST['horario'],ENT_QUOTES),
                        htmlentities($_POST['descripcion'],ENT_QUOTES))) {
                            // echo "ENTRA";
                            echo '<script> window.location="./modificarestablecimiento.php";</script>';
                    }
                }
            }
        ?>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>

<?php loadclasses("view","footer.html"); ?>

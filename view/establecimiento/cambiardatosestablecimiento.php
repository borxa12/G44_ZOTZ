<?php
    session_start();
    ob_start();
    ini_set('display_errors',1);
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    if($_SESSION['tipo'] != 'est') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
      $establecimiento = recuperarDatosEstablecimiento($_SESSION['login']);
?>

            <h1>Modificar Establecimiento</h1>
                <div class="cleaner_h40"></div>
                <br></br>

                <form name="modificarestablecimiento" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombre">Nombre</label>
                            <input type = "text" name="nombre" placeholder="Nombre establecimiento" maxlength=90 value="<?php echo $establecimiento['nombre'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="direccion">Dirección</label>
                            <input type = "text" name="direccion" placeholder="Dirección establecimiento" maxlength=90 value="<?php echo $establecimiento['direccion'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="telefono">Teléfono</label>
                            <input type="tel" name="telefono" placeholder="Teléfono del establecimiento" maxlength=20 value="<?php echo $establecimiento['telefono'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="horario">Horario</label>
                            <input type="tel" name="horario" placeholder="Horario del establecimiento" maxlength=15 value="<?php echo $establecimiento['horario'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="web">Web</label>
                            <input type = "text" name="web" placeholder="Web establecimiento" maxlength=45 value="<?php echo $establecimiento['web'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Email establecimiento" maxlength=50 value="<?php echo $establecimiento['email'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Nueva password" maxlength=45 value="<?php echo $establecimiento['password'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="confirmarpassword">Confirmar Password</label>
                            <input type="password" name="confirmarpassword" placeholder="Repetir la nueva password" maxlength=45 value="<?php echo $establecimiento['password'];?>"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcion">Descripción</label>
                            <textarea rows="4" cols="50" name="descripcion" maxlength=200  placeholder="Nueva descripción"><?php echo $establecimiento['descripcion'];?></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button name="modificar" type="submit" class="btn btn-default button">Guardar</button>
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
                            echo '<script> alert("Las contraseñas no coinciden");</script>';
                            echo '<script> window.location="./cambiardatosestablecimiento.php";</script>';
                        } else {
                            if (modificarDatosEstablecimiento($_SESSION['login'],$_POST['password'],
                                $_POST['email'],$_POST['nombre'],$_POST['direccion'],
                                $_POST['telefono'],$_POST['web'],$_POST['horario'],
                                $_POST['descripcion'])) {
                                  echo "ENTRA";
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

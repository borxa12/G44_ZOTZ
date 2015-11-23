<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    loadclasses("controller","ControladorNoRegistrado.php");
    if(isset($_SESSION['tipo'])) {
        header("Location: http://localhost/Zotz/index.php"); // Cuidado
    } else {
?>

<h1>Registro</h1>
<form id="registroestablecimiento" method="post">
    <div id=templatemo_form>
        <div>
            <label for="loginjuradopopular">Login</label>
            <input type="text" name="loginjuradopopular"/>
            <br></br>
        </div>
        <div>
            <label for="emailjuradopopular">Email</label>
            <input type="email" name="emailjuradopopular" title="example@example.com"/>
            <br></br>
        </div>
        <div>
            <label for="passwordjuradopopular">Password</label>
            <input type="password" name="passwordjuradopopular"/>
            <br></br>
        </div>
        <div>
            <label for="repetirpasswordjuradopopular">Repetir Password</label>
            <input type="password" name="repetirpasswordjuradopopular"/>
            <br></br>
        </div>
    </div>
    <button name="btnalta" type="submit" class="btn btn-default button">Darse de alta</button>
    <button type="submit" formaction="./registro_login.php" class="btn btn-default button">Volver</button>
</form>

<?php
    if(isset($_POST['btnalta'])) {
        if($_POST['loginjuradopopular'] == "" || $_POST['emailjuradopopular'] == "" ||
            $_POST['passwordjuradopopular'] == "" || $_POST['repetirpasswordjuradopopular'] == "") {
                echo '<script> alert("Debe rellenar todos los campos");</script>';
                echo '<script> window.location="./registro.php";</script>';
        } else if(strcmp($_POST['passwordjuradopopular'],$_POST['repetirpasswordjuradopopular'])) {
            echo '<script> alert("Las contraseñas no coinciden");</script>';
            echo '<script> window.location="./registro.php";</script>';
        } else {
            if (alta($_POST['loginjuradopopular'],$_POST['passwordjuradopopular'],
                $_POST['emailjuradopopular'],'jpop')) {
                    header("Location: http://localhost/Zotz/view/noregister/registro_login.php");
                } else {
                    echo '<script> alert("O login xa existe. Tenteo con outro.");</script>';
                    echo '<script> window.location="./registro.php";</script>';
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

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

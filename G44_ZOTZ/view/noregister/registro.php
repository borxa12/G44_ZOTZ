<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");
    loadclasses("controller","ControladorNoRegistrado.php");

    if(isset($_SESSION['tipo'])) {
        header("Location: ../../index.php");
    } else {
?>

<h1>Rexistro</h1>
<form id="registroestablecimiento" method="post">
    <div id=templatemo_form>
        <div>
            <label for="loginjuradopopular">Login</label>
            <input name="loginjuradopopular" type="text" autocomplete="off" title="No se admiten Ñ ni acentos" pattern="[^ñáéíóú`´]{1,20}" maxlength=20 required/>
            <br></br>
        </div>
        <div>
            <label for="emailjuradopopular">Email</label>
            <input type="email" maxlength=50 name="emailjuradopopular" title="example@example.com"/>
            <br></br>
        </div>
        <div>
            <label for="passwordjuradopopular">Contrasinal</label>
            <input name="passwordjuradopopular" type="password" autocomplete="off" title="No se admiten Ñ ni acentos" pattern="[^ñáéíóú`´]{1,45}" maxlength=45 required/>
            <br></br>
        </div>
        <div>
            <label for="repetirpasswordjuradopopular">Repetir Contrasinal</label>
            <input name="repetirpasswordjuradopopular" type="password" autocomplete="off" title="No se admiten Ñ ni acentos" pattern="[^ñáéíóú`´]{1,45}" maxlength=45 required/>
            <br></br>
        </div>
    </div>
    <button name="btnalta" type="submit" class="btn btn-default button">Darse de alta</button>
    <button type="submit" formaction="./registro_login.php" class="btn btn-default button">Voltar</button>
</form>

<?php
    if(isset($_POST['btnalta'])) {
        if($_POST['loginjuradopopular'] == "" || $_POST['emailjuradopopular'] == "" ||
            $_POST['passwordjuradopopular'] == "" || $_POST['repetirpasswordjuradopopular'] == "") {
                echo '<script> alert("Debe rellenar todos los campos");</script>';
                echo '<script> window.location="./registro.php";</script>';
        } else if(strcmp($_POST['passwordjuradopopular'],$_POST['repetirpasswordjuradopopular'])) {
            echo '<script> alert("Las contrase\u00f1as no coinciden");</script>';
            echo '<script> window.location="./registro.php";</script>';
        } else {
            if (alta($_POST['loginjuradopopular'],$_POST['passwordjuradopopular'],
                $_POST['emailjuradopopular'],'jpop')) {
                    header("Location: ./registro_login.php");
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

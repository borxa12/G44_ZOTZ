<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    // session_start(); // Cuidado
    // if(isset($_SESSION['login'])) header("Location: http://localhost/Zotz/login.php"); // Cuidado
    if(isset($_SESSION['tipo'])) {
        header("Location: http://localhost/Zotz/index.php"); // Cuidado
    } else {
?>

<h1>Acceso Personal</h1>

<form id="registrarse" method="post">
    <button name="registrarseusuario" type="submit" formaction="http://localhost/Zotz/view/noregister/registro.php" class="btn btn-default button">Registrarse como nuevo usuario</button>
    <button name="registrarseestablecimiento" type="submit" formaction="http://localhost/Zotz/view/noregister/registrarestablecimiento.php" class="btn btn-default button">Registrarse como nuevo establecimiento</button>
    <br/><br/><br/>
</form>

<form id="login" action="http://localhost/Zotz/login.php" method="post">
    <div id=templatemo_form>
        <div>
            <label for="login">Login</label>
            <input name="login" type="text" autocomplete="off"/>
            <br></br>
        </div>
        <div>
            <label for="login">Password</label>
            <input name="password" type="password" autocomplete="off"/>
            <br></br>
        </div>
    </div>
    <button name="cancelar" type="submit" class="btn btn-default button">Cancelar</button>
    <button name="iniciarsesion" type="submit" class="btn btn-default button">Inciar Sesión</button>
</form>


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

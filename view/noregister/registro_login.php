<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");

    if(isset($_SESSION['tipo'])) {
        header("Location: ../../index.php"); // Cuidado
    } else {
?>

<h1>Acceso Persoal</h1>

<form id="registrarse" method="post">
    <button name="registrarseusuario" type="submit" formaction="./registro.php" class="btn btn-default button">Rexistrarse como novo usuario</button>
    <button name="registrarseestablecimiento" type="submit" formaction="./registrarestablecimiento.php" class="btn btn-default button">Rexistrarse como novo establecemento</button>
    <br/><br/><br/>
</form>

<form id="login" action="../../login.php" method="post">
    <div id=templatemo_form>
        <div>
            <label for="login">Login</label>
            <input name="login" type="text" title="No se admiten Ñ ni acentos" pattern="[^ñáéíóú`´]{1,20}" maxlength=20 required/>
            <br></br>
        </div>
        <div>
            <label for="login">Contrasinal</label>
            <input name="password" type="password" title="No se admiten Ñ ni acentos" pattern="[^ñáéíóú`´]{1,45}" maxlength=45 required/>
            <br></br>
        </div>
    </div>
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

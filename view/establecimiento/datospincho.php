<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'est') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
		<form id="registropincho" method="post">
            <div id=templatemo_form>
                <div>
                    <label for="nombrepincho">Nombre</label>
                    <h4>Nombre Pincho</h4>
                    <br></br>
                </div>
                <div>
                    <label for="descripcionpincho">Descripcion</label>
                    <h4>Descripcion Pincho</h4>
                    <br></br>
                </div>
                <div>
                    <label for="ingrdientespincho">Ingredientes</label>
                    <h4>Ingredientes Pincho</h4>
                    <br></br>
                </div>
                <div>
                    <label for="fotopincho">Foto</label>
                    <img src="" alt="image" class="img">
                    <br></br>
                </div>
		    </div>
            <button type="submit" formaction="gestionpinchos.php" class="btn btn-default button">Volver</button>
            <button type="submit" formaction="modificarpincho.php" class="btn btn-default button">Modificar</button>
        </form>
        <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

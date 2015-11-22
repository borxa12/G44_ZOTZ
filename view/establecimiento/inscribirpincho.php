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
                        <div>
                            <label for="nombrepincho">Nombre</label>
                            <input type = "text" id="nombrepincho" />
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionpincho">Descripcion</label>
                            <textarea rows="4" cols="50" id="descripcionpincho"></textarea>
                            <br></br>
                        </div>
                        <div>
                            <label for="ingrdientespincho">Ingredientes</label>
                            <textarea rows="4" cols="50" id="ingredientespincho"></textarea>
                            <br></br>
                        </div>
                        <div>
                            <label for="fotopincho">Foto</label>
                            <input type="file" id="fotopincho" />
                            <br></br>
                        </div>
                    <button type="submit" formaction="gestionpinchos.php" class="btn btn-default button">Cancelar</button>
                    <button type="submit" formaction="gestionpinchos.php" class="btn btn-default button">Inscribir Pincho</button>
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

<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
				<form id="registropincho" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombrepincho">Nombre</label>
                            <h4>Nombre Pincho</h4>
                            </br>
                        </div>
                        <div>
                            <label for="descripcionpincho">Descripcion</label>
                            <p>Descripcion Pincho</p>
                            </br>
                        </div>
                        <div>
                            <label for="ingrdientespincho">Ingredientes</label>
                            <p>Ingredientes Pincho</p>
                            </br>
                        </div>
                        <div>
                            <label for="fotopincho">Foto</label>
                            <img src="" class="img" alt="image">
                            </br>
                        </div>
						<div>
							<label for="jurado">Miembros del jurado</label></br></br>
							<input type="checkbox" name="jurado1" value="jurado1">jurado1<br>
							<input type="checkbox" name="jurado2" value="jurado2">jurado2<br>
							<input type="checkbox" name="jurado3" value="jurado3">jurado3<br>
							<input type="checkbox" name="jurado4" value="jurado4">jurado4<br>
							<input type="checkbox" name="jurado5" value="jurado5">jurado5<br><br><br>
						</div>
				    </div>
					<button type="submit" formaction="asignarpinchojuradoprofesional.php" class="btn btn-default button">Guardar</button>
                </form>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

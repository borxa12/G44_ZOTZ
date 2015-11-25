<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    ini_set('display_errors',1);
    if($_SESSION['tipo'] != 'est') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
      $res = concursoActual();
      $concurso = mysqli_fetch_assoc($res);
?>
				<form name="registropincho" method="post" action="gestionpinchos.php" enctype="multipart/form-data">
              <input name="concurso" hidden="true" value="<?php echo $concurso['edicion'];?>"type = "text"/>
                        <div>
                            <label for="nombrepincho">Nombre</label>
                            <input name="nombrepincho" maxlength=100 type="text"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionpincho">Descripcion</label>
                            <textarea name="descripcionpincho" maxlength=500 rows="4" cols="50" ></textarea>
                            <br></br>
                        </div>
                        <div>
                            <label for="ingredientespincho">Ingredientes</label>
                            <textarea name="ingredientespincho" rows="4" maxlength=250 cols="50"></textarea>
                            <br></br>
                        </div>
                        <div>
                            <label for="precio">Precio</label>
                            <input name="precio" maxlength=5 type="text"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="foto">Foto</label>
                            <input name="fotopincho" type="file"/>
                            <br></br>
                        </div>
                        <button name="inscribirpincho" type="submit" class="btn btn-default button">Inscribir Pincho</button>
                        <button name="cancelar" type="submit" class="btn btn-default button">Cancelar</button>
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

<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>
					<form id="registropincho" method="post">
                        <div>
                            <label for="nombrepincho">Nombre</label>
                            <input type = "text" id="nombrepincho" placeholder="Nombre Pincho" value="Nombre del pincho en la BD"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionpincho">Descripcion</label>
                            <textarea rows="4" cols="50" id="descripcionpincho" placeholder="Descripcion Pincho">Descipcion del pincho en la BD</textarea>
                            <br></br>
                        </div>
                        <div>
                            <label for="ingrdientespincho">Ingredientes</label>
                            <textarea rows="4" cols="50" id="ingredientespincho" placeholder="Ingredientes Pincho">Ingredientes del pincho en la BD</textarea>
                            <br></br>
                        </div>
                        <div>
                            <label for="fotopincho">Foto</label>
                            <input type="file" id="fotopincho" />
                            <br></br>
                        </div>
					<div>
                    <button type="submit" formaction="datospincho.php" class="btn btn-default button">Cancelar</button>
                    <button type="submit" formaction="datospincho.html" class="btn btn-default button">Guardar Pincho</button>
					</div>
                </form>
				</div>
                <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

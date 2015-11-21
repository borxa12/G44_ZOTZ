<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>
				<h1>Datos Establecimiento</h1>
                <div class="cleaner_h40"></div>
                <br></br>
                    <div id=templatemo_form>
                        <div>
                            <label for="nombreestablecimiento">Nombre: </label>
							<h5>Nombre Establecimiento</h5>
                            </br>
                        </div>
                        <div>
                            <label for="direccionestablecimiento">Dirección</label>
                            <h4>Direccion Establecimiento</h4>
                            </br>
                        </div>
                        <div>
                            <label for="telefonoestablecimiento">Teléfono</label>
                            <h4>Teléfono Establecimiento</h4>
                            </br>
                        </div>
                        <div>
                            <label for="webestablecimiento">Web</label>
                            <h4>Web Establecimiento</h4>
                            </br>
                        </div>
                        <div>
                            <label for="emailestablecimiento">Email</label>
                            <h4>Email Establecimiento</h4>
                            </br>
                        </div>
                        <div>
                            <label  for="horarioestablecimiento">Horario</label>
                            <h4>Horario Establecimiento</h4>
                            </br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descripción</label>
                            <h4>Descripción Establecimiento<h4>
                            </br>
                        </div>
                    </div>
                    <form id="volverestablecimientos" method="post">
                        <button type="submit" formaction="establecimientos.php" class="btn btn-default button">Volver</button>
                    </form>
                <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

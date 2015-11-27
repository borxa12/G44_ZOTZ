<?php
    session_start();
    ob_start();
    ini_set('display_errors',1);
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");

    if($_SESSION['tipo'] != 'est') {
        header("Location: ../../index.php");
    } else {
      $establecimiento = recuperarDatosEstablecimiento($_SESSION['login']);
?>
				<h1>Datos Establecimiento</h1>
                <div class="cleaner_h40"></div>
                <br></br>
                    <div id=templatemo_form>
                        <div>
                            <label for="nombreestablecimiento">Nombre: </label>
							<h5><?php echo $establecimiento['nombre'];?></h5>
                            </br>
                        </div>
                        <div>
                            <label for="direccionestablecimiento">Dirección</label>
                            <h4><?php echo $establecimiento['direccion'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label for="telefonoestablecimiento">Teléfono</label>
                            <h4><?php echo $establecimiento['telefono'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label for="webestablecimiento">Web</label>
                            <h4><?php echo $establecimiento['web'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label  for="loginestablecimiento">Login</label>
                            <h4><?php echo $establecimiento['login'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label for="emailestablecimiento">Email</label>
                            <h4><?php echo $establecimiento['email'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label  for="horarioestablecimiento">Horario</label>
                            <h4><?php echo $establecimiento['horario'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descripción</label>
                            <h4><?php echo $establecimiento['descripcion'];?><h4>
                            </br>
                        </div>
                    </div>
                    <form id="actionestablecimientodeletemodify" method="post">
                       <input name="concurso" hidden="true" value="<?php echo $establecimiento['login'];?>"type = "text"/>
                        <button type="submit" formaction="cambiardatosestablecimiento.php" class="btn btn-default button">Modificar</button>
                        <button type="button" onclick="confirmar()" class="btn btn-default button">Eliminar</button>
                    </form>

                    <script>
                        function confirmar() {
                            var r = confirm("¿Esta seguro de eliminar el establecimiento?");
                            if (r == true) {
                                window.location="index.php?eliminar=true";
                            }
                        }
                    </script>

                <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>

<?php loadclasses("view","footer.html"); ?>

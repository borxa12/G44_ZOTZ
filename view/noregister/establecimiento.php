<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("controller","ControladorEstablecimiento.php");

    if(isset($_SESSION['tipo'])) {
        switch ($_SESSION['tipo']) {
            case 'org':
                loadclasses("menus","menuorganizador.html");
                break;
            case 'jpop':
                loadclasses("menus","menujuradopopular.html");
                break;
            case 'jpro':
                loadclasses("menus","menujuradoprofesional.html");
                break;
            case 'est':
                loadclasses("menus","menuestablecimiento.html");
                break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
    $res = recuperarDatosEstablecimiento($_GET['establecimiento']);
?>
	<h1>Datos Establecemento</h1>
    <div class="cleaner_h40"></div>
    <br></br>
        <div id=templatemo_form>
            <div>
                <label for="nombreestablecimiento">Nome: </label>
				<h5><?php echo $res['nombre'] ?></h5>
                </br>
            </div>
            <div>
                <label for="direccionestablecimiento">Dirección</label>
                <h4><?php echo $res['direccion'] ?></h4>
                </br>
            </div>
            <div>
                <label for="telefonoestablecimiento">Teléfono</label>
                <h4>Tlf.: <?php echo $res['telefono'] ?></h4>
                </br>
            </div>
            <div>
                <label for="webestablecimiento">Web</label>
                <h4>Web: <?php echo $res['web'] ?></h4>
                </br>
            </div>
            <div>
                <label for="emailestablecimiento">Email</label>
                <h4>Email: <?php echo $res['email'] ?></h4>
                </br>
            </div>
            <div>
                <label  for="horarioestablecimiento">Horario</label>
                <h4>Horario: <?php echo $res['horario'] ?></h4>
                </br>
            </div>
            <div>
                <label for="descripcionestablecimiento">Descrición</label>
                <h4><?php echo $res['descripcion'] ?><h4>
                </br>
            </div>
        </div>
        <form id="volverestablecimientos" method="post">
            <button type="submit" formaction="establecimientos.php" class="btn btn-default button">Voltar</button>
        </form>
    <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

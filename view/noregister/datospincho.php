<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    // loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorJuradoProfesional.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

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
            // default:
            //     loadclasses("menus","nomenu.html");
            //     break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
    $res = recuperarPincho($_GET['pincho']);
    while($r = mysqli_fetch_assoc($res)) {
?>
		<form id="registropincho" method="post">
            <div id=templatemo_form>
                <div>
                    <label for="nombrepincho">Nombre</label>
                    <h4> <?php echo $r['nombrepincho'] ?> </h4>
                    <br></br>
                </div>
                <div>
                    <label for="descripcionpincho">Descripcion</label>
                    <h4><?php echo $r['descripcionpincho'] ?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="ingrdientespincho">Ingredientes</label>
                    <h4><?php echo $r['ingredientesp'] ?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="fotopincho">Foto</label>
                    <img src="<?php echo '../../img/pinchos/'.$r['fotopincho']; ?>" alt="image" class="img">
                    <br></br>
                </div>
		    </div>
            <button type="submit" formaction="finalistas.php" class="btn btn-default button">Volver</button>
        </form>
    <?php
        }
    ?>
        <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

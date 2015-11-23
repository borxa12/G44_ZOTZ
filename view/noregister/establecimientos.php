<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    // loadclasses("menus","nomenu.html");
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
?>
            <h1>Establecimientos</h1>
            <div class="registrarestablecimiento">
                <a href="registrarestablecimiento.php">Registra aqui tu establecimiento</a>
            </div>

            <div class="product_box">
                <a href="" class="pirobox"><img src="" alt="image" class="img"/></a>
                <h4>Nombre Establecimiento</h4>
                <p> Dirección </p>
                <p> Teléfono </p>
                <p> Web </p>
                <form id="accesoestablecimiento" method="post">
                    <button type="submit" formaction="establecimiento.php" class="btn btn-default button">Ver</button>
                </form>
            </div>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

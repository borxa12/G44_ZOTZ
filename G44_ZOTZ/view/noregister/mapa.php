<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");

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
?>

<h1>Gastromama</h1>

</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>

<?php loadclasses("view","footer.html"); ?>

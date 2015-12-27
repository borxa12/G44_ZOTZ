<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("controller","ControladorJuradoProfesional.php");

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

<h1>Lista de pinchos finalistas</h1>

<?php
    $pinchos = listar2Ronda($_SESSION['login']);
    if(mysqli_num_rows($pinchos) == 0) {
        echo '<h4>Non tes pinchos que votar</h4>';
    } else {
        while($r = mysqli_fetch_assoc($pinchos)) {
            $p = new Pincho();
            $p = $p->recuperar($r['pincho_idpincho']);
            $data = mysqli_fetch_assoc($p);
            echo "<div class='product_box'>";
                echo "<a href='' class='pirobox'><img src='../../img/pinchos/".$data['fotopincho']."' alt='image' class='img'/></a>";
                echo "<h4>".$data['nombrepincho']."</h4>";
                echo "</p>";
                echo "<form name='btnverpincho' method='post' action='./votopincho2ronda.php?pincho=".$data['idpincho']."'>";
                    echo "<button name='btnverpincho' type='submit' class='btn btn-default button'>Votar</button>";
                echo "</form>";
            echo "</div>";

        }
    }

?>

</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>

<?php loadclasses("view","footer.html"); ?>

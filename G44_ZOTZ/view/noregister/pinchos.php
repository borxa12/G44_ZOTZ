<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("controller","ControladorNoRegistrado.php");

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

<h1>Lista de pinchos</h1>

<?php
    $pinchos = listarPinchosUltimaEdicion();
    if(mysqli_num_rows($pinchos) == 0) {
        echo '<h4>A&iacute;nda non se rexistraron pinchos U+1F622</h4>';
    } else {
        while($r = mysqli_fetch_assoc($pinchos)) {
            echo "<div class='product_box'>";
                echo "<a href='' class='pirobox'><img src='../../img/pinchos/".$r['fotopincho']."' alt='image' class='img'/></a>";
                echo "<h4>".$r['nombrepincho']."</h4>";
                echo "<p>Establecemento: ";
                        $est = recuperarDatosEstablecimiento($r['establecimiento_usuarios_login']);
                        echo $est['nombre'];
                echo "</p>";
                echo "<p>Precio: ".$r['precio']."</p>";
                echo "<form name='btnverpincho' method='post' action='./datospincho.php?pincho=".$r['idpincho']."'>";
                    echo "<button name='btnverpincho' type='submit' class='btn btn-default button'>Ver</button>";
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

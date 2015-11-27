<?php
    session_start();
    ob_start();

    ini_set('display_errors',1);

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

<h1>Finalistas</h1>

<?php
    $finalistas = recuperarFinalistas();
    if(mysqli_num_rows($finalistas) == 0) {
        echo '<h4>Aínda non rematou o concuros. Non sexas impaciente.</h4>';
    } else {
        while($f = mysqli_fetch_assoc($finalistas)) {
            $res = recuperarPincho($f['pincho_idpincho']);
            $r = mysqli_fetch_assoc($res);
                echo "<div class='product_box'>";
                    echo "<a href='' class='pirobox'><img src='../../img/pinchos/".$r['fotopincho']."' alt='image' class='img'/></a>";
                    echo "<h4>".$r['nombrepincho']."</h4>";
                    echo "<p>";
                            $est = recuperarDatosEstablecimiento($r['establecimiento_usuarios_login']);
                            echo $est['nombre'];
                    echo "</p>";
                    echo "<p>Nota: ".$f['media']."</p>";
                    echo "<form name='verfinalista' method='post' action='./datospincho.php?pincho=".$r['idpincho']."'>";
                        echo "<button name='btnver' type='submit' class='btn btn-default button'>Ver</button>";
                    echo "</form>";
                echo "</div>";
        }
    }
?>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

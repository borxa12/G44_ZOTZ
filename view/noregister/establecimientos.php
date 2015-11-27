<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    // loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
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
            // default:
            //     loadclasses("menus","nomenu.html");
            //     break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
?>
            <h1>Establecimientos</h1>

            <?php
                $pinchos = listarPinchosUltimaEdicion();
                if(mysqli_num_rows($pinchos) == 0) {
                    echo '<h4>Aínda non se rexistraron establecementos :(</h4>';
                } else {
                    while($f = mysqli_fetch_assoc($pinchos)) {
                        $r = recuperarDatosEstablecimiento($f['establecimiento_usuarios_login']);
                        // $r = mysqli_fetch_array($res);
                            echo "<div class='product_box'>";
                                // echo "<a href='' class='pirobox'><img src='../../img/pinchos/".$r['fotopincho']."' alt='image' class='img'/></a>";
                                echo "<h4>".$r['nombre']."</h4>";
                                echo "<p>".$r['direccion']."</p>";
                                echo "<p>Tlf.: ".$r['telefono']."</p>";
                                echo "<p>Web: ".$r['web']."</p>";
                                echo "<p>Horario: ".$r['horario']."</p>";
                                // echo "<p>".$r['descripcion']."</p>";
                                echo "<form name='verfinalista' method='post' action='./establecimiento.php?establecimiento=".$r['login']."'>";
                                    echo "<button name='btnver' type='submit' class='btn btn-default button'>Ver</button>";
                                echo "</form>";
                                //     if(isset($_POST['btnver'])) {
                                //         header("Location: ./establecimiento.php?establecimiento=".$r['idpincho']);
                                //     }
                            echo "</div>";

                    }
                }
            ?>

            <!-- <div class="registrarestablecimiento">
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
                </form>-->
            </div>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

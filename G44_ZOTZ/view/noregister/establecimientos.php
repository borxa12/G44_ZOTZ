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
        <h1>Establecementos</h1>

        <?php
            $pinchos = listarPinchosUltimaEdicion();
            if(mysqli_num_rows($pinchos) == 0) {
                echo '<h4>A&iacute;nda non se rexistraron establecementos U+1F614</h4>';
            } else {
                while($f = mysqli_fetch_assoc($pinchos)) {
                    $r = recuperarDatosEstablecimiento($f['establecimiento_usuarios_login']);
                        echo "<div class='product_box'>";
                            echo "<h4>".$r['nombre']."</h4>";
                            echo "<p>".$r['direccion']."</p>";
                            echo "<p>Tlf.: ".$r['telefono']."</p>";
                            echo "<p>Web: ".$r['web']."</p>";
                            echo "<p>Horario: ".$r['horario']."</p>";
                            echo "<form name='verfinalista' method='post' action='./establecimiento.php?establecimiento=".$r['login']."'>";
                                echo "<button name='btnver' type='submit' class='btn btn-default button'>Ver</button>";
                            echo "</form>";
                        echo "</div>";

                }
            }
        ?>
        
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

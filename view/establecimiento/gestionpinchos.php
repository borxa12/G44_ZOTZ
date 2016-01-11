<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

        ini_set('display_errors',1);
    if($_SESSION['tipo'] != 'est') {
        header("Location: ../../index.php");
    } else {
        if(isset($_POST['inscribirpincho'])) {
            $concurso = htmlentities($_POST['concurso'],ENT_QUOTES);
            $nombre = htmlentities($_POST['nombrepincho'],ENT_QUOTES);
            $descripcionpincho = htmlentities($_POST['descripcionpincho'],ENT_QUOTES);
            $ingredientespincho = htmlentities($_POST['ingredientespincho'],ENT_QUOTES);
            $precio = htmlentities($_POST['precio'],ENT_QUOTES);
            $trozos = explode(".", $_FILES['fotopincho']['name']);
            $extension = end($trozos);
            $foto = "pincho_".$concurso."_".$_SESSION['login'].".".$extension;
            move_uploaded_file($_FILES['fotopincho']['tmp_name'], "../../img/pinchos/".$foto);
            enviarPropuestaGatronomica($nombre, $foto, $descripcionpincho, $ingredientespincho, $precio, $concurso, $_SESSION['login']);
        }
        $listapinchos = listarPinchos($_SESSION['login']);
?>
				<h1>Pinchos</h1>

                  <?php
                    $res = concursoActual();
                    $concurso = mysqli_fetch_assoc($res);
                    $res = comprobarPropuestasEstablecimiento($concurso['edicion'],$_SESSION['login']);
                    $nump = mysqli_fetch_assoc($res);
                    if($nump['contador']==0){
                      echo "<div class='registrarestablecimiento'>";
                      echo "<a href='inscribirpincho.php'>Inscribir pincho para a próxima edici&oacute;n</a>";
                      echo "</div>";
                    }
                    ?>
<?php
            if($listapinchos!=null){
              while($linea = mysqli_fetch_assoc($listapinchos)){
                echo "<div class='product_box'>";
                    echo "<a href='datospincho.php?idpincho=".$linea['idpincho']."'  class='pirobox'><img src='../../img/pinchos/".$linea['fotopincho']."' alt='image' class='img' /></a>";
                    echo "<h4>".$linea['nombrepincho']."</h4>";
                    echo "<p>Edición: ".$linea['concurso_edicion']." </p>";
                    echo "<form id='verpincho' method='post'>";
                        echo "<button type='submit' formaction='datospincho.php?idpincho=".$linea['idpincho']."' class='btn btn-default button'>Ver</button>";
                    echo "</form>";
                echo "</div>";
              };
            }
?>
	</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>

<?php loadclasses("view","footer.html"); ?>

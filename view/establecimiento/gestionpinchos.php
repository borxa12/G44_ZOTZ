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
        header("Location: http://localhost/Zotz/index.php");
    } else {
      if(isset($_POST['inscribirpincho'])){
        $concurso = $_POST['concurso'];
        $nombre = $_POST['nombrepincho'];
        $descripcionpincho = $_POST['descripcionpincho'];
        $ingredientespincho = $_POST['ingredientespincho'];
        $precio = $_POST['precio'];
        $trozos = explode(".", $_FILES['fotopincho']['name']);
        $extension = end($trozos);
        $foto = "pincho_".$concurso."_".$_SESSION['login'].".".$extension;
        move_uploaded_file($_FILES['fotopincho']['tmp_name'], "../../img/pinchos/".$foto);
        enviarPropuestaGatronomica($nombre, $foto, $descripcionpincho, $ingredientespincho, $precio, $concurso, $_SESSION['login']);
      }
      $listapinchos = listarPinchos($_SESSION['login']);
?>
				<h1>Pinchos</h1>
                <div class="registrarestablecimiento">
                    <a href="inscribirpincho.php">Inscribir pincho para la proxima edicion</a>
                </div>
<?php
            if($listapinchos!=null){
              while($linea = mysqli_fetch_assoc($listapinchos)){
                echo "<div class='product_box'>";
                    echo "<a href='datospincho.php?idpincho=".$linea['idpincho']."'  class='pirobox'><img src='' alt='image' class='img' /></a>";
                    echo "<h4>Nombre Pincho</h4>";
                    echo "<p> Edicion </p>";
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

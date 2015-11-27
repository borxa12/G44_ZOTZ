<?php
    session_start();
    ob_start();
    ini_set('display_errors',1);
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
    } else {
      $ed = concursoActual();
      $concurso = mysqli_fetch_assoc($ed);
      $lista = listarPinchosAceptados($concurso['edicion']);
?>
				 <h1>Pinchos</h1>

          <?php
               if($lista){
         		while ($fila = mysqli_fetch_assoc($lista)) {
         			echo "<div class='product_box'>";
         			echo "<a href='asignarjurado.php?idpincho=".$fila['idpincho']."' class='pirobox'><img src='../../img/pinchos/".$fila['fotopincho']."' alt='image' class='img'/></a>";
         			echo "<h4>".$fila["nombrepincho"]."</h4>";
         			echo "<p>".$fila["descripcionpincho"]."</p>";
              echo "<form id='asignarpincho' method='post'>";
         			echo "<button type='submit' formaction='asignarjurado.php?idpincho=".$fila['idpincho']."' class='btn btn-default button'>Asignar</button>";
         	        echo "</div>";
              echo "</form>";
         		}
         	}

           ?>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

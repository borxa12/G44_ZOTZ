<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
    	$lista = listarPinchosSinAceptar();
?>
        <h1>Propuestas Gastronomicas</h1>
	<form id="propuestasgastronomica" method="post">
<?php
	while ($fila = mysqli_fetch_assoc($lista)) {
			echo "<div class='product_box'>";
	    echo "<a href='' class='pirobox'><img src='' alt='image' class='img'/></a>";
			echo "<h4>".$fila["nombrepincho"]."</h4>";
			echo "<p>".$fila["descripcionpincho"]."</p>";
			echo "<button type='submit' formaction='aceptardenegarpropuesta.php' class='btn btn-default button'>Evaluar</button>";
	         echo "</div>";
		}
    }
    
?>
 </form>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>
<?php loadclasses("view","footer.html"); ?>

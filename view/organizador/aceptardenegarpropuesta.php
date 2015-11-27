<?php
    session_start();
    ob_start();
   include("../../loader.php");
   loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    loadclasses("controller","ControladorOrganizador.php");

    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
    } else {
    	$id = $_GET["idpincho"];
	$datos = datosPropuestaGastronomica($id);
	$fila = mysqli_fetch_assoc($datos);
?>
<div>
				<h1>Propuestas Gastronómicas</h1>
				<?php
				echo "<h4>Nombre: ".$fila["nombrepincho"]."</h4>";
				echo "<h4>Ingredientes: ".$fila["ingredientesp"]."</h4>";
				echo "<h4>Descripcion: ".$fila["descripcionpincho"]."</h4>";
				echo "<h4>Precio: ".$fila["precio"]."</h4>";
	      echo "<div class=''>";
	      echo "<h4> Foto: </h4>";
	      echo "<a href='#''><img src='../../img/pinchos/".$fila['fotopincho']."' alt='image' class='img'/></a>";
	      echo "</div>";

				?>
	<div class="button">
		<form id="aceptarpincho" method="POST">
		<input type="hidden" name="idpincho" value="<?php echo $id?>">
		<button  type="submit" formaction="propuestasgastronomicas.php" name="Aceptar" class="btn btn-default button">Aceptar</button>
		<button type="submit" formaction="propuestasgastronomicas.php" name="Denegar" class="btn btn-default button">Denegar</button>
		</form>

	</div>
	</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>



<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

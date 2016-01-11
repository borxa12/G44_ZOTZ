<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");

    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
    } else {
        if(isset($_POST["idpincho"])) {
    		if(isset($_POST['Aceptar'])) $a = "A";
    		if(isset($_POST['Denegar'])) $a = "D";
    		$id=$_POST['idpincho'];
    		gestionarPropuesta($id,$a);
    	}
	$lista = listarPinchosSinAceptar();
?>
        <h1>Propostas Gastronomicas</h1>
        <form id="propuestasgastronomica" method="post" action=aceptardenegarpropuesta.php>

<?php
        if($lista) {
        	while ($fila = mysqli_fetch_assoc($lista)) {
        		echo "<div class='product_box'>";
        		echo "<a href='' class='pirobox'><img src='../../img/pinchos/".$fila['fotopincho']."' alt='image' class='img'/></a>";
        		echo "<h4>".$fila["nombrepincho"]."</h4>";
        		echo "<p>".$fila["descripcionpincho"]."</p>";
        		echo "<button type='submit' formaction='aceptardenegarpropuesta.php?idpincho=".$fila['idpincho']."' class='btn btn-default button'>Avaliar</button>";
                echo "</div>";
        	}
        }
    }
?>
        </form>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

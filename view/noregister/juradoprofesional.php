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
            // default:
            //     loadclasses("menus","nomenu.html");
            //     break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }

	$lista= listaJuradoProfesional();

?>

<h1>Miembros del jurado profesional</h1>
<?php
	if($lista){
		while ($fila = mysqli_fetch_assoc($lista)) {
			echo "<div class='product_box'>";
			echo "<a href='' class='pirobox'><img src='../../img/juradoprofesional/".$fila['fotojuradoprofesional']."' alt='image' class='img'/></a>";
			echo "<h4>".$fila["nombrejuradoprofesional"]."</h4>";
			echo "<p>".$fila["reconocimientos"]."</p>";
			echo "</div>";

		}
	}
?>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>
<?php loadclasses("view","footer.html"); ?>

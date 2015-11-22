<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
                <h1>Propuestas Gastronomicas</h1>
                <form id="propuestagastronomica" method="post">
	                <div class="product_box">
	                    <a href="" class="pirobox"><img src="" alt="image" class="img"/></a>
	                    <h4>Nombre Pincho</h4>
	                    <p> Descripcion del pincho.</p>
						<button type="submit" formaction="aceptardenegarpropuesta.php" class="btn btn-default button">Evaluar</button>
	                </div>
                </form>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

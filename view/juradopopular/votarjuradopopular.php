<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menujuradopopular.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    
    if($_SESSION['tipo'] != 'jpop') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
			<!-- <div id="contenido" class="col-xs-12 col-sm-9 col-md-9"> -->
				<h1>Votar</h1>
				<div id=templatemo_form>
					<h2>Introducir códigos</h2>
					<form id="votojuradopopular" method="post">
						<div>
							<label>Codigo 1</label> <input id="cod1" name="cod1" type="text" />
							<br></br>
						</div>
						<div>
							<label>Codigo 2</label> <input id="cod2" name="cod2" type="text" />
							<br></br>
						</div>
						<div>
							<label>Codigo 3</label> <input id="cod3" name="cod3" type="text" />
							<br></br>
						</div>
						<button type="submit" formaction="votarpincho.php" class="btn btn-default button">Votar</button>
					</form>
				</div>
            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

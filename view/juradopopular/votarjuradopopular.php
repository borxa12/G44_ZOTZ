<?php
    session_start();
    ob_start();
    include_once("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menujuradopopular.html");
    loadclasses("controller","ControladorJuradoPopular.php");

    if($_SESSION['tipo'] != 'jpop') {
        header("Location: ../../index.php");
    } else {
?>
			<!-- <div id="contenido" class="col-xs-12 col-sm-9 col-md-9">  action="http://localhost/Zotz/view/juradopopular/votarpincho.php" -->
				<h1>Votar</h1>
				<div id=templatemo_form>
					<h2>Introducir códigos</h2>
					<form id="votojuradopopular" method="post">
						<div>
							<label>Codigo 1</label> <input name="cod1" type="text"/>
							<br></br>
						</div>
						<div>
							<label>Codigo 2</label> <input name="cod2" type="text" />
							<br></br>
						</div>
						<div>
							<label>Codigo 3</label> <input name="cod3" type="text" />
							<br></br>
						</div>
						<button type="submit" name="votar" class="btn btn-default button">Votar</button>
						<?php
						    if(isset($_POST["votar"])){
						    	$c1 = $_POST['cod1'];
						    	$c2 = $_POST['cod2'];
						    	$c3 = $_POST['cod3'];

								if (validarCodigo($c1) && validarCodigo($c2) && validarCodigo($c3)){

									$cp1 = new CodigoPincho();
									$p1 = new Pincho();
									$res1 = $cp1->recuperar($c1);
									$data1 = mysqli_fetch_assoc($res1);
									$id1 = $data1['pincho_idpincho'];

									$cp2 = new CodigoPincho();
									$p2 = new Pincho();
									$res2 = $cp2->recuperar($c2);
									$data2 = mysqli_fetch_assoc($res2);
									$id2 = $data2['pincho_idpincho'];

									$cp3 = new CodigoPincho();
									$p3 = new Pincho();
									$res3 = $cp3->recuperar($c3);
									$data3 = mysqli_fetch_assoc($res3);
									$id3 = $data3['pincho_idpincho'];
     					?>
					<?php
									if($id1!=$id2 && $id3!=$id2){
										header("Location: ./votarpincho.php?cod1=$c1&cod2=$c2&cod3=$c3");
									}else{

										echo '<script> alert("Los c\u00f3digos deben ser de pinchos diferentes");</script>';
										echo '<script> window.location="./votarjuradopopular.php";</script>';
									}
								}else {
									echo '<script> alert("Alg\u00fan c\u00f3digo no es v\u00e1lido");</script>';
						            echo '<script> window.location="./votarjuradopopular.php";</script>';
						        }
   							}
   					?>
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

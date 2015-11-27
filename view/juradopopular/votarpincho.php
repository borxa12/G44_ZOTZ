<?php
    session_start();
    ob_start();
    
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menujuradopopular.html");
    loadclasses("controller","ControladorJuradoPopular.php");

    if($_SESSION['tipo'] != 'jpop') {
        header("Location: ../../index.php");
    } else {
		//if(isset($_POST["votar"])){

		    $c1 = $_GET['cod1'];
		    $c2 = $_GET['cod2'];
		    $c3 = $_GET['cod3'];

		    $cp1 = new CodigoPincho();
			$p1 = new Pincho();
			$res1 = $cp1->recuperar($c1);
			$data1 = mysqli_fetch_assoc($res1);
			$id1 = $data1['pincho_idpincho'];
			$resp1 = $p1->recuperar($id1);
			$datap1 = mysqli_fetch_assoc($resp1);

		    $cp2 = new CodigoPincho();
			$p2 = new Pincho();
			$res2 = $cp2->recuperar($c2);
			$data2 = mysqli_fetch_assoc($res2);
			$id2 = $data2['pincho_idpincho'];
			$resp2 = $p2->recuperar($id2);
			$datap2 = mysqli_fetch_assoc($resp2);

		    $cp3 = new CodigoPincho();
			$p3 = new Pincho();
			$res3 = $cp3->recuperar($c3);
			$data3 = mysqli_fetch_assoc($res3);
			$id3 = $data3['pincho_idpincho'];
			$resp3 = $p3->recuperar($id3);
			$datap3 = mysqli_fetch_assoc($resp3);

		//}
?>
<!-- <body>
			<div id="contenido" class="col-xs-12 col-sm-9 col-md-9"> -->
				<h1>Votar</h1>
				<div id=templatemo_form>
					<h2>Selecciona un favorito</h2>
					<form id="votojuradopopular" method="post">
						<div class="product_box">
							<input type="radio" name="pincho" value="<?php echo $c1; ?>"><?php echo $datap1['nombrepincho']; ?><br>
							<a href="" class="pirobox"><img src="<?php echo "../../img/pinchos/".$datap1['fotopincho']; ?>" class="img"/></a>
							<p><?php echo $datap1['descripcionpincho']; ?></p>
						</div>
						<div class="product_box">
							<input type="radio" name="pincho" value="<?php echo $c2; ?>"><?php echo $datap2['nombrepincho']; ?><br>
							<a href="" class="pirobox"><img src="<?php echo "../../img/pinchos/".$datap2['fotopincho']; ?>" class="img"/></a>
							<p><?php echo $datap2['descripcionpincho']; ?></p>
						</div>
						<div class="product_box">
							<input type="radio" name="pincho" value="<?php echo $c3; ?>"><?php echo $datap3['nombrepincho']; ?><br>
							<a href="" class="pirobox"><img src="<?php echo "../../img/pinchos/".$datap1['fotopincho']; ?>" class="img"/></a>
							<p><?php echo $datap3['descripcionpincho']; ?></p>
						</div>
                        <button type="submit" name="enviarvoto" class="btn btn-default button" >Enviar Voto</button>
                        <?php
                    	if (isset($_POST['enviarvoto'])){
                        		$cod = $_POST['pincho'];
                        		$cp = new CodigoPincho();
                        		switch($cod){
                        			case $cod==$c1:
                        				$cp->modificar($c1,1);
                        				$cp->modificar($c2,0);
                        				$cp->modificar($c3,0);
                        				break;
                        			case $cod==$c2:
                        				$cp->modificar($c1,0);
                        				$cp->modificar($c2,1);
                        				$cp->modificar($c3,0);
                        				break;
                        			case $cod==$c3:
                        				$cp->modificar($c1,0);
                        				$cp->modificar($c2,0);
                        				$cp->modificar($c3,1);
                        				break;
                        		}
                        		header("Location: ./index.php");
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

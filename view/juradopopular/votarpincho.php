<?php
    require_once '../header.php';
    require_once '../../menus/menujuradopopular.html';
?>

<body>
			<div id="contenido" class="col-xs-12 col-sm-9 col-md-9">
				<h1>Votar</h1>
				<div id=templatemo_form>
					<h2>Selecciona un favorito</h2>
					<form id="votojuradopopular" method="post">
						<div class="product_box">
							<input type="radio" name="pincho" value="pincho1">Nombre pincho1<br>
							<a href="" class="pirobox"><img src="" alt="image" class="img"/></a>
							<p>Descripcion del pincho1</p>
						</div>
						<div class="product_box">
							<input type="radio" name="pincho" value="pincho2">Nombre pincho2<br>
							<a href="" class="pirobox"><img src="" alt="image" class="img"/></a>
							<p>Descripcion del pincho2</p>
						</div>
						<div class="product_box">
							<input type="radio" name="pincho" value="pincho3">Nombre pincho3<br>
							<a href="" class="pirobox"><img src="" alt="image" class="img"/></a>
							<p>Descripcion del pincho3</p>
						</div>
                		<div class="btn btn-default button"><a href="#" data-toggle="modal" data-target="#confirmacionVotoPincho">Votar</a></div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-1"></div>
	</div>
<?php   require_once '../footer.php'; ?>

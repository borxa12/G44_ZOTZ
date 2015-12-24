<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="ABP_G44" content="ABP_G44">

	<title>ZOTZ</title> <!-- Titulo de la pestaña -->
	<link rel="shortcut icon" href="http://localhost/G44_ZOTZ/img/zotz.ico" /> <!-- Icono de la pestaña -->

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/G44_ZOTZ/css/main.css">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

	<header>
		<div class="col-xs-12 col-sm-12 col-md-1"></div>
		<div id="cabecera" class="col-xs-12 col-sm-12 col-md-10">
			<a href="http://localhost/G44_ZOTZ/index.php">
				<img id="logo" src="http://localhost/G44_ZOTZ/img/zotz.png">
				<h6>ZOTZ</h6>
			</a>
			<!-- Barra de Navegación Principal con Menú desplegable lateral -->
			<nav class="navbar navbar-default menu_principal" role="navigation">
				<!-- Minibotón para móviles -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle mini_menu" data-toggle="collapse" data-target="#mini_menu">
						<span class="sr-only">Desplegar navegación</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<!-- Menú Principal -->
				<div id="mini_menu" class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/pinchos.php">Pinchos</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/establecimientos.php">Establecementos</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/juradoprofesional.php">Xurado Profesional</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/finalistas.php">Finalistas</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/ganadores.php">Ganadores</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/favoritos.php">Favoritos</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/mapa.php">Gastromapa</a></li>
						<li><a href="http://localhost/G44_ZOTZ/view/noregister/folleto.php">Folleto</a></li>
						<?php
							if(isset($_SESSION['login'])) {
								echo "";
							} else {
								?>
								<li><a href="http://localhost/G44_ZOTZ/view/noregister/registro_login.php">Login</a></li>
								<?php
							}
						?>
					</ul>
				</div>
				</div>
			</nav>
		</div>
		<div class="completar col-xs-12 col-sm-12 col-md-1"></div>
	</header>

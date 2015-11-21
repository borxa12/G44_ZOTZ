<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="ABP_G44" content="ABP_G44">

	<title>ZOTZ</title> <!-- Titulo de la pestaña -->
	<link rel="shortcut icon" href="http://localhost/Zotz/img/zotz.ico" /> <!-- Icono de la pestaña -->

	<!-- Bootstrap CSS-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/Zotz/css/main.css">

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

	<header>
		<div class="col-xs-12 col-sm-12 col-md-1"></div>
		<div id="cabecera" class="col-xs-12 col-sm-12 col-md-10">
			<a href="http://localhost/Zotz/index.php">
				<img id="logo" src="http://localhost/Zotz/img/zotz.png">
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
						<li><a href="http://localhost/Zotz/view/noregister/pinchos.php">Pinchos</a></li> <!-- http://127.0.0.1/Zotz/view/noregister/pinchos.php -->
						<li><a href="http://localhost/Zotz/view/noregister/establecimientos.php">Establecimientos</a></li> <!-- ./view/noregister/establecimientos.html -->
						<li><a href="http://localhost/Zotz/view/noregister/juradoprofesional.php">Jurado Profesional</a></li>
						<li><a href="http://localhost/Zotz/view/noregister/mapa.php">Gastromapa</a></li>
						<li><a href="http://localhost/Zotz/view/noregister/folleto.php">Folleto</a></li>
						<li><a href="#" data-toggle="modal" data-target="#login">Registrarse</a></li> <!-- #login -->
					</ul>

					<!-- Buscador -->
					<!-- <form class="navbar-form navbar-left" role="search"> -->
						<!-- <div class="form-group"> -->
							<!-- <input type="text" class="form-control" placeholder="Buscar"> -->
						<!-- </div> -->
						<!-- <button type="submit" class="btn btn-default">Enviar</button> -->
					<!-- </form> -->
				</div>

					<!-- Buscador -->
					<!-- <form class="navbar-form navbar-left" role="search"> -->
						<!-- <div class="form-group"> -->
							<!-- <input type="text" class="form-control" placeholder="Buscar"> -->
						<!-- </div> -->
						<!-- <button type="submit" class="btn btn-default">Enviar</button> -->
					<!-- </form> -->
				</div>
			</nav>
		</div>
		<div class="completar col-xs-12 col-sm-12 col-md-1"></div>
	</header>

	<!-- Login Modal Page -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	    <div class="modal-dialog" role="document">
	        <div class="modal-content">
	            <div class="modal-header">
	                <a href="http://localhost/Zotz/view/noregister/registro.php"><button type="button" class="btn btn-register">Registrarse</button></a>
	                <h4 class="modal-title osSansFont" id="myModalLabel">Registro</h4>
	            </div>

	            <!-- Contenido de la página modal -->
	            <div class="modal-body">
	                <form name="sentMessage" id="loginForm" novalidate>
	                    <div class="row control-group">
	                        <div class="form-group col-xs-12 floating-label-form-group controls">
	                            <label>Login</label>
	                            <input type="text" class="form-control" placeholder="Login" id="login" required data-validation-required-message="Introduzca su login">
	                            <p class="help-block text-danger"></p>
	                        </div>
	                    </div>
	                    <div class="row control-group">
	                        <div class="form-group col-xs-12 floating-label-form-group controls">
	                            <label>Contraseña</label>
	                            <input type="password" class="form-control" placeholder="Contraseña" id="password" required data-validation-required-message="Introduzca su contraseña">
	                            <p class="help-block text-danger"></p>
	                        </div>
	                    </div>
	                </form>
	            </div>

	            <div class="modal-footer">
	                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	                <button type="submit" class="btn-login">Iniciar sesion</button>
	            </div>
	        </div>
	    </div>
	</div>

<!-- </body>
</html> -->

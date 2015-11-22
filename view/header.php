<?php
    // session_start();
    // ob_start();
    // include("../../loader.php");
    // loadclasses("view","header.php");
    // loadclasses("menus","menujuradoprofesional.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    // if($_SESSION['tipo'] != 'jpro') {
    //     header("Location: http://localhost/Zotz/index.php");
    // } else {
?>
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
						<?php
							if(isset($_SESSION['login'])) {
								echo "";
							} else {
								?>
								<li><a href="http://localhost/Zotz/view/noregister/registro_login.php">Login</a></li>
								<?php
							}
						?>
						<!-- <li><a href="#" data-toggle="modal" data-target="#login">Registrarse</a></li> -->
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

<!-- </body>
</html> -->

<!-- Login Modal Page -->
<!-- <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="http://localhost/Zotz/view/noregister/registro.php">
					<button type="button" class="btn btn-register">Registrarse</button>
				</a>
                <h4 class="modal-title osSansFont" id="myModalLabel">Registro</h4>
            </div> -->

            <!-- Contenido de la página modal -->
            <!-- <div class="modal-body">
                <form id="loginForm" action="../login.php" method="POST">
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Login</label>
                            <input name="login" type="text" class="form-control" placeholder="Login" required data-validation-required-message="Introduzca su login">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contraseña</label>
                            <input name	="password" type="password" class="form-control" placeholder="Contraseña" required data-validation-required-message="Introduzca su contraseña">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="conectarse" type="submit" class="btn-login">Iniciar sesion</button>
            </div>
        </div>
    </div>
</div> -->

<!-- Generar Códigos Modal Page -->
<div class="modal fade" id="generarCodigos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form  id="codigos" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Código</h4>
                            </div>
                            <div>
                                <h1 id="code">ASFKJ777</h1>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>

<!-- Seleccionar Finalistas Modal Page -->
<div class="modal fade" id="seleccionarFinalistas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form  id="nfinalistas" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Número de Finalistas</h4>
                            </div>
                            <input type="number" class="form-control" placeholder="Número de Finalistas" id="nfinalista" required data-validation-required-message="Intruduzca el número de finalistas">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="seleccionarfinalistas.php"><button type="submit" class="btn btn-register">Seleccionar Finalistas</button></a>
            </div>
        </div>
    </div>
</div>

<!-- Confirmación Voto Pincho Modal Page -->
<div class="modal fade" id="confirmacionVotoPincho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form  id="nfinalistas" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Confirmación</h4>
                            </div>
                            <div>
                                <h2>¿Está seguro de querer votar a este pincho?</h2>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <form id="confirmacion" method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" formaction="http://localhost/Zotz/view/juradopopular/votarjuradopopular.php" class="btn btn-register">Si</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Confirmación Eliminar Establecimiento Modal Page -->
<div class="modal fade" id="eliminarestablecimiento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form  id="nfinalistas" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Confirmación</h4>
                            </div>
                            <div>
                                <h2>¿Está seguro de borrar tu establecimiento del sistema?</h2>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <form id="confirmacion" method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" formaction="http://localhost/Zotz/index.php" class="btn btn-register">Si</button>
                </form>
            </div>
        </div>
    </div>
</div>

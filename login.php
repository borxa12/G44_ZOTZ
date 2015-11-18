<?php
	require_once 'db_connection.php';
	session_start();

	if(isset($_POST["iniciar_sesion"])) {
		try {
			$stmt = $connection->prepare("SELECT count(username) FROM usuarios WHERE login=? AND password=?");
			$stmt->execute(array($_POST["login"],$_POST["password"]));
			if($stmt->fetchColumn() == 1){
				$_SESSION["currentuser"] = $_POST["username"];
				header("Location: index.html");
				die();
			} else {
				echo "Usuario no válido";
			}
			// echo "Login: " . $data["login"] . "<br/>";
			// echo "Password: " . $data["password"] . "<br/>";
			// echo "Email: " . $data["email"] . "<br/>";
			// echo "Tipo de Usuario: " . $data["tipo"] . "<br/>";
		} catch(Exception $e) {
			die("Excepcion: " . $e->getMessage());
		}
	}
?>

<html>
<body>
	<!-- Login Modal Page -->
	<div class="modal fade" id="login" tabindex="-1" role="dialog"
		<div class="modal-dialog" role="document" aria-labelledby="myModalLabel">
			<div class="modal-content">
				<div class="modal-header">
					<a href="registro.html"><button type="button"
							class="btn btn-register">Registrarse</button></a>
					<h4 class="modal-title" id="myModalLabel">Registro</h4>
				</div>

				<!-- Contenido de la pagina modal -->
				<div class="modal-body">
					<form name="sentMessage" id="loginForm" action="login.php" method="POST" novalidate>
						<div class="row control-group">
							<div class="form-group col-xs-12 floating-label-form-group controls">
								<label>Login</label>
								<input type="text" class="form-control" placeholder="Login"
										id="login" required data-validation-required-message="Introduzca su login">
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="row control-group">
							<div
								class="form-group col-xs-12 floating-label-form-group controls">
								<label><?php echo(htmlentities("Contraseña",ENT_QUOTES));?></label> <input type="password"
									class="form-control" placeholder="<?php echo(htmlentities("Contraseña",ENT_QUOTES));?>" id="password"
									required
									data-validation-required-message=<?php echo(htmlentities("Introduzca su contraseña",ENT_QUOTES));?>>
								<p class="help-block text-danger"></p>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" name="cancelar" class="btn btn-default" data-dismiss="modal">Cancelar</button>
							<button type="submit" name="iniciar_sesion" class="btn-login">Iniciar sesion</button>
						</div>
					</form>
 				</div>
			</div>
		</div>
	</div>
</body>
</html>

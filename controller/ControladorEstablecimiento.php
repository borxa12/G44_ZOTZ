<?php

    include_once("../../loader.php");
    loadclasses("model","Usuarios.php");
    loadclasses("model","CodigoPincho.php");
    loadclasses("model","Pincho.php");
    loadclasses("model","Establecimiento.php");
    loadclasses("model","BD.php");
    
	/* Inserta una tupla de usuario y otra de establecimiento con los parametros indicados.
	*  Parametros:
	*       $login - Atributo a insertar, clave primaria del establecimiento (usuarios_login).
	*				$password - Atributo a insertar, contraseña del usuario.
	*				$email - Atributo a insertar, email del establecimiento.
	*       $nombre - Atributo a insertar, nombre del establecimiento.
	*       $direccion - Atributo a insertar, direccion del establecimiento.
	*       $telefono - Atributo a insertar, telefono del establecimiento.
	*       $web - Atributo a insertar, web del establecimiento.
	*       $horario - Atributo a insertar, horario del establecimiento.
	*       $descripcionestablecimiento - Atributo a insertar, descripcción del establecimiento.
	*  Return: Devuelve TRUE si la tupla se inserta correctamente o FALSE en caso contrario.
	*/
	 function altaEstablecimiento($login,$password,$email,$nombre,$direccion,$telefono,$web,$horario,$descripcion) {
		 $usu = new Usuarios();
		 $est = new Establecimiento();
		 $res1 = $usu->insertar($login,$password,$email,"est");
		 $res2 = $est->insertar($login,$nombre,$direccion,$telefono,$web,$horario,$descripcion);
		 return ($res1 && $res2);
	}
	/* Elimina una tupla de usuario y otra de establecimiento a partir del login.
	*  Parametros:
	*       $login - Atributo a comprobar, clave primaria del establecimiento (usuarios_login).
	*  Return: Devuelve TRUE si la tupla se elimina correctamente o FALSE en caso contrario.
	*/
	 function bajaEstablecimiento($login) {
		  $usuario = new Usuarios();
		 	$establecimento = new Establecimiento();
			$res1 = $usuario->eliminar($login);
			$res2 = $establecimiento->eliminar($login);
			return ($res1 && $res2);
	}
	/* Modifica una tupla de usuario y otra de establecimiento con los parametros indicados.
	*  Parametros:
	*       $login - Atributo a Comprobar, clave primaria del establecimiento (usuarios_login).
	*				$password - Atributo a insertar, contraseña del usuario.
	*				$email - Atributo a insertar, email del establecimiento.
	*       $nombre - Atributo a insertar, nombre del establecimiento.
	*       $direccion - Atributo a insertar, direccion del establecimiento.
	*       $telefono - Atributo a insertar, telefono del establecimiento.
	*       $web - Atributo a insertar, web del establecimiento.
	*       $horario - Atributo a insertar, horario del establecimiento.
	*       $descripcionestablecimiento - Atributo a insertar, descripcción del establecimiento.
	*  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
	*/
	 function modificarDatosEstablecimiento($login,$password,$email,$nombre,$direccion,$telefono,$web,$horario,$descripcion) {
		 $usuario = new Usuarios();
		 $establecimento = new Establecimiento();
		 $res1 = $usuario->modificar($login, $password, $email);
		 $res2 = $establecimiento->modificar($login, $nombre, $direccion, $telefono, $web, $horario, $descripcionestablecimiento);
		 return ($res1 && $res2);
	}
	/* Recupera los datos de un establecimiento utilizando el login.
	*  Parametros:
	*       $login - Atributo a Comprobar, clave primaria del establecimiento (usuarios_login).
	*  Return: Devuelve un array con los datos del establecimiento si ha sido posible encontrarlos o FALSE en caso contrario.
	*/
	 function recuperarDatosEstablecimiento($login) {
		$usuario = new Usuarios();
		$res1 = $usuario->recuperar($login);
		if($res1==0) return false;
		$res2 = $establecimiento->recuperar($login);
		if($res1==0) return false;
		$result = array(
			"login" => $login,
			"password" => $res1["password"],
			"email" => $res1["email"],
			"nombre" => $res1["nombre"],
			"direccion" => $res1["direccion"],
			"telefono" => $res1["telefono"],
			"web" => $res1["web"],
			"horario" => $res1["horario"],
			"descripcion" => $res1["descripcion"],
		);
		return $result;
	}

	/* Inserta una tupla de pincho con los parametros indicado.
	*  Parametros:
	*       $idpincho - Atributo a insertar, clave primario del pincho (idpincho).
	*       $nombrepincho - Atributo a insertar, nombre del picho.
	*       $fotopincho - Atributo a insertar, foto del pincho.
	*       $descripcionpincho - Atributo a insertar, descripcion del pincho.
	*       $ingredientesp - Atributo a insertar, ingredientes del pinco.
	*       $precio - Atributo a insertar, tipo de usuario (jpop, jpro, org, est).
	*       $concurso_edicion - Atributo a insertar, indica la edicion en la que participa el pincho.
	*       $establecimiento_usuarios_login - Atributo a insertar, login del establecimiento al que pertenece el pincho.
	*  Return: Devuelve TRUE si la tupla se inserta correctamente o FALSE en caso contrario.
	*/
	 function enviarPropuestaGatronomica($idpincho, $nombrepincho, $fotopincho, $descripcionpincho, $ingredientesp, $precio, $concurso_edicion, $establecimiento_usuarios_login) {
		 $pincho = new Pincho();
		 return $pincho->insertar($idpincho, $nombrepincho, $fotopincho, $descripcionpincho, $ingredientesp, $precio, NULL, $concurso_edicion, $establecimiento_usuarios_login);
	}
	/* Recupera los datos de un pincho en concreto.
	*  Parametros:
	*       $idpincho - Atributo a comprobar, clave primario del pincho (idpincho).
	*  Return: Devuelve los datos del pincho solicitado o FALSE en caso contrario.
	*/
	 function recuperarDatosPincho($id) {
		 $pincho = new Pincho();
		 return $pincho->recuperar($id);
	}
	/* Modifica una tupla de pincho con los parametros indicado.
	*  Parametros:
	*       $idpincho - Atributo a comprobar, clave primario del pincho (idpincho).
	*       $nombrepincho - Atributo a modificar, nombre del picho.
	*       $fotopincho - Atributo a modificar, foto del pincho.
	*       $descripcionpincho - Atributo a modificar, descripcion del pincho.
	*       $ingredientesp - Atributo a modificar, ingredientes del pinco.
	*       $precio - Atributo a modificar, tipo de usuario (jpop, jpro, org, est).
	*  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
	*/
	 function modificarDatosPincho($idpincho, $nombrepincho, $fotopincho, $descripcionpincho, $ingredientesp, $precio) {
		 $pincho = new Pincho();
		 return $pincho->modificar($idpincho, $nombrepincho, $fotopincho, $descripcionpincho, $ingredientesp, $precio, NULL);
	}

	/* Esta funcion llama a codigoAleatorio() para generar un código nuevo.
	*  Si el código no es válido vuelve a generar otro, así hasta que encuentre uno válido.
	*  Llama a relacionarCodigo para añadirlo a la BD.
	*/
	 function generarCodigos($estlogin, $ed) {
	 	do{
	 		$codigo = codigoAleatorio();
	 	}while (validarCodigo($codigo) == false);
	 	$res = relacionarCodigo($estlogin, $codigo, $ed);
	 	if ($res == false) return false;
	 	else return $codigo;
	}

	/* Función que genera un código aleatoriode 6 dígitos alfanuméricos
	*/
	 function codigoAleatorio() {
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      	$codigo = '';
      	for ($i = 0; $i < 6; $i++) {
        	$codigo .= $chars[rand(0, strlen($chars) - 1)];
      	}
      	return $codigo;
	}

	/* Comprueba si el códogo ($cod) que se le pasa por parámetro es válido,
	*  si el código está en la BD devuelve false si no devuelve true
	*/
	function validarCodigo($cod) {
        $codPincho = new CodigoPincho();
        $res = $codPincho->recuperar($cod);
        if($res == false) return true;
        else return false;
	}

	/* Esta funcion llama a la función insertar de la clase CodigoPincho para añadir el nuev código
	*  con el login del establecimiento y el id del pincho al que está asociado.
	*  Por defecto el campo likes está a null.
	*/
	 function relacionarCodigo($estlogin, $cod, $ed) {
	 	$codigopincho = new CodigoPincho();
	 	$pincho = new Pincho();
	 	$res = $pincho->recuperarActualEstablecimiento($estlogin, $ed);
	 	if ($res == false) return false;
	 	else{
	 		$data = mysqli_fetch_assoc($res);
       		$id = $data['idpincho'];
        	return $codigopincho->insertar($cod, $estlogin, $id);
        }
	}

	 function cerrarSesion() {

	}

//echo generarCodigos('establecimiento1',1);
?>

<?php

	loadclasses("model","BD.php");
	loadclasses("model","Establecimiento.php");
	loadclasses("model","CodigoPincho.php");
	loadclasses("model","Establecimiento.php");
	loadclasses("model","JuradoProfesional.php");
	loadclasses("model","Pincho.php");
	loadclasses("model","Usuarios.php");
	loadclasses("model","VotaProfesional.php");
	loadclasses("model","Comentarios.php");

	/* Lista los establecimientos, incluyendo identificador y atributos.
	*  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
	*/
	function listaEstablecimientos() {
		$establecimiento = new Establecimiento();
		return $establecimiento->listar();
	}

	/* Lista los establecimientos de la última edición disponible.
	*  Return: Devuelve los datos del último concurso o FALSE en caso contrario.
	*/
	function listarPinchosUltimaEdicion() {
		$pincho = new Pincho();
		return $pincho->listarUltimos();
	}


	/* Lista los identificadores de los pinchos y sus atributos.
	*  Return: Devuelve los datos del pincho sin tratar o FALSE en caso de error.
	*/
	function listaPinchos(){
		$pincho = new Pincho();
		return $pincho->listar();
	}

    /* Inserta una tupla de usuario con los parametros indicado.
    *  Parametros:
    *       $login - Atributo a insertar, clave primario del usuario (login).
    *       $password - Atributo a insertar, constraseña del usuario.
    *       $email - Atributo a insertar, email del usuario.
    *       $tipo - Atributo a insertar, tipo de usuario (jpop, jpro, org, est).
    *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
    */
	function alta($login,$password,$email,$tipo){
		$usuario = new Usuarios();
		return $usuario->insertar($login,$password,$email,$tipo);
	}

	/*  Permite a un usuario iniciar sesion si su login y password son correctos
	*   Parametros:
	*       $login - Atributo a comprobar, login del usuario que quiere iniciar sesion.
	*       $password - Atributo a comprobar, contraseña del usuario que quiere iniciar sesion.
	*   Return: Devuelve 1 si hay exactamente una coincidencia con los atributos que se pasan por parametro.
	*/
	function iniciarSesion($login,$password){
		$usuario = new Usuarios();
		return $usuario->login($login,$password);
	}

	/*  Lista el JuradoProfesional inscrito en el concurso.
	*   Return: Devuelve una lista con los atributos de todos los miembros del JuradoProfesional.
	*/
	function listaJuradoProfesional(){
		$juradoProfesional = new JuradoProfesional();
		return $juradoProfesional->listar();
	}

	/*  Obtiene el gastromapa de una edicion del concurso.
	*   Parametros:
	*       $edicion - Atributo a comprobar, edicion de la cual se quiere recuperar el gastromapa.
	*   Return: Devuelve el atributo gastromapa si ha sido posible encontrarlo.
	*/
	function obtenerGastromapa($edicion){
		$concurso = new Concurso();
		$res = $concurso->recuperar($edicion);
		return $res['gastromapa'];
	}

	/* 	Funcion que recupera la información del pincho al que esta asociado $cod (codigopincho).
	*	Parametros:
	*		$cod: es el código del pincho que se quiere consultar.
	*	Return: devuelve la información de dicho pincho.
	*/
	function recuperarPincho($cod) {
			$pincho = new Pincho();
			$res = $pincho->recuperar($cod);
			return $res;
	}

	/*  Obtiene el folleto de una edicion del concurso.
	*   Parametros:
	*       $edicion - Atributo a comprobar, edicion de la cual se quiere recuperar el folleto.
	*   Return: Devuelve el atributo folleto si ha sido posible encontrarlo.
	*/
	function obtenerFolleto($edicion){
		$concurso = new Concurso();
		$res = $concurso->recuperar($edicion);
		return $res['folleto'];
	}

	/*  Recupera los pinchos finalistas.
	*   Return: Devuelve los pinchos finalistas, FALSE en caso contrario.
	*/
	function recuperarFinalistas(){
		$votopro = new VotaProfesional();
		$res = $votopro->recuperarFinalistas();
		return $res;
	}

	/*  Recupera los pinchos ganadores.
	*   Return: Devuelve los pinchos finalistas, FALSE en caso contrario.
	*/
	function recuperarGanadores(){
		$votopro = new VotaProfesional();
		$res = $votopro->recuperarGanadores();
		return $res;
	}

	/*  Recupera los pinchos favoritos.
	*   Return: Devuelve los pinchos favoritos, FALSE en caso contrario.
	*/
	function recuperarFavoritos(){
		$codpincho = new CodigoPincho();
		$res = $codpincho->recuperarFavoritos();
		return $res;
	}

	/*  Obtiene los datos de un establecimiento por su login.
	*   Parametros:
	*       $login - Atributo a comprobar, establecimiento del que se quieren recuerar los datos.
	*   Return: Devuelve un array con los datos del establecimiento o FALSE si el estaablecimiento no existe.
	*/
	function recuperarDatosEstablecimiento($login) {
			$usuario = new Usuarios();
			$establecimento = new Establecimiento();
			$res1 = $usuario->recuperar($login);
			if($res1===0) return false;
			$res2 = $establecimento->recuperar($login);
			if($res2===0) return false;
			$aux1 = mysqli_fetch_assoc($res1);
			$aux2 = mysqli_fetch_assoc($res2);
			$result = array(
							"login" => $login,
							"password" => $aux1["password"],
							"email" => $aux1["email"],
							"nombre" => $aux2["nombre"],
							"direccion" => $aux2["direccion"],
							"telefono" => $aux2["telefono"],
							"web" => $aux2["web"],
							"horario" => $aux2["horario"],
							"descripcion" => $aux2["descripcionestablecimiento"]
					);
			return $result;
	}
	/*  Obtiene los comentarios para un pincho por su id.
	*   Parametros:
	*       $idpincho - Atributo a comprobar, id del pincho del que se quiere recuperar sus comentarios.
	*   Return: Devuelve un array con los comentarios del pincho si tiene alguno.
	*/
	function obtenerComentarios($idpincho){
		$comentario = new Comentarios();
		return $comentario->listarPorPincho($idpincho);
	}

	/*  Inserta un nuevo comentario en la base de datos
	*   Parametros:
	*       $idpincho - Atributo a insertar, id del pincho del del que se quiere insertar el nuevo comentario.
	*       $login - Atributo a insertar, login del usuario que ha hecho el comentario.
	*       $comentario - Atributo a insertar, comentario realizado por el usuario.
	*   Return: Devuelve true si el comentario se ha insertado correctamente.
	*/
	function guardarComentario($idpincho,$login,$coment){
		$comentario = new Comentarios();
		return $comentario->insertarComentario($idpincho,$login,$coment);
	}
	
?>

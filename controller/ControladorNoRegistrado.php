<?php

	// require_once '../model/BD.php';
	// require_once '../model/Establecimiento.php';
	// require_once '../model/CodigoPincho.php';
	// require_once '../model/Establecimiento.php';
	// require_once '../model/JuradoProfesional.php';
	// require_once '../model/Pincho.php';
	// require_once '../model/Usuarios.php';
	// require_once '../model/VotaProfesional.php';
	loadclasses("model","BD.php");
	loadclasses("model","Establecimiento.php");
	loadclasses("model","CodigoPincho.php");
	loadclasses("model","Establecimiento.php");
	loadclasses("model","JuradoProfesional.php");
	loadclasses("model","Pincho.php");
	loadclasses("model","Usuarios.php");
	// loadclasses("model","VotaProfesional.php");

	/* Lista los establecimientos, incluyendo identificador y atributos.
	*  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
	*/
	function listaEstablecimientos() {
		$establecimiento = new Establecimiento();
		return $establecimiento->listar();
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

?>

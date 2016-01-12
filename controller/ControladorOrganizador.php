<?php

	loadclasses("model","Pincho.php");
	loadclasses("model","BD.php");
	loadclasses("model","JuradoProfesional.php");
	loadclasses("model","CodigoPincho.php");
	loadclasses("model","Usuarios.php");
	loadclasses("model","VotaProfesional.php");
	loadclasses("model","Concurso.php");


	/*  Lista los miembros del jurado profesional a los que no se les ha asignado ese pincho($id)
	*   Parametros:
	*		$id - clave primaria del pincho para el que se van a listar los jurados profesionales.
	*   Return: Devuelve una lista con los miembros del jurado profesional no asignados al pincho.
	*/
	function listarJuradoProfesionalNoAsignado($id){
		$juradoprofesional = new JuradoProfesional();
		return $juradoprofesional->juradoNoAsignado($id);
	}

	/*  Añade un valor al campo aceptado de la tupla identificada por $id(idpincho)
	*   Parametros:
	*		$id - clave primaria del pincho a modificar.
	*		$a - valor que se le va a asignar al campo aceptado (A o D).
	*   Return: Devuelve TRUE si se han podido modificar los datos, FALSE en caso contrario.
	*/
	function gestionarPropuesta($id,$a) {
		$datos = datosPropuestaGastronomica($id);
		$fila = mysqli_fetch_assoc($datos);
		$id = $fila["idpincho"];
		$nombre = $fila["nombrepincho"];
		$foto = $fila["fotopincho"];
		$descripcion = $fila["descripcionpincho"];
		$ingredientes = $fila["ingredientesp"];
		$precio = $fila["precio"];
		$pincho = new Pincho();
		return $pincho->modificar($id, $nombre, $foto, $descripcion, $ingredientes, $precio, $a);
	}

	/*  Lista los pinchos que tienen el campo aceptado a N.
	*   Return: Devuelve una lista con los pinchos sin aceptar.
	*/
	function listarPinchosSinAceptar(){
		$concurso = new Concurso();
		$con = $concurso->recuperarUltimoConcurso();
		$ed = mysqli_fetch_assoc($con);
		$edicion = $ed['edicion'];
		$pincho = new Pincho();
		$lista = $pincho->listarSinGestionar($edicion);
		return $lista;
	}

	/*  Lista los pinchos aceptados(campo aceptado=A) para una edición concreta.
	*   Parametros:
	*		$ed - edicion para la que se quieren listar los pinchos.
	*   Return: Devuelve una lista con los pinchos aceptados para la edicion $ed
	*/
	function listarPinchosAceptados($ed){
			$pincho = new Pincho();
			$lista = $pincho->listarAceptados($ed);
			return $lista;
	}

    /*  Recupera los finalistas de la BD, es decir, los pinchos con mejor media de las notas del jurado profesional en primera ronda.
    *   Parametros:
    *        $num - Número máximo de finalistas.
    *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
    */
    function seleccionarFinalistas($num) {
		$vpro = new VotaProfesional();
		$res = $vpro->eleccionFinalistas($num);
		return $res;
	}

	/*  Recupera los favoritos de la BD, es decir, los pinchos con mejor puntuación según el jurado popular.
    *   Parametros:
    *        $num - Número máximo de favoritos.
    *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
    */
    function seleccionarFavoritos($num) {
		$fav = new CodigoPincho();
		$res = $fav->eleccionFavoritos($num);
		return $res;
	}

	/*  Recupera los finalistas de la BD, es decir, los pinchos con mejor media de las notas del jurado profesional en segunda ronda.
    *   Parametros:
    *        $num - Número máximo de ganadores.
    *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
    */
    function seleccionarGanadores($num) {
		$vpro = new VotaProfesional();
		$res = $vpro->eleccionGanadores($num);
		return $res;
	}

    /*  Comprueba que el $num no excecde al numero de participantes.
    *   Parametros:
    *        $num - Número a comprobar.
    *   Return: Devuelve TRUE si $num excede al numero de participantes, FALSO en caso contrario
    */
    function comprobarParticipantes($num) {
		$pincho = new Pincho();
		$res = $pincho->listar();
		if(mysqli_num_rows($res) >= $num) return true;
		else return false;
    }

	/*  Comprueba que el $num no excecde al numero de finalistas.
    *   Parametros:
    *        $num - Número a comprobar.
    *   Return: Devuelve TRUE si $num excede al numero de finalistas, FALSO en caso contrario
    */
    function comprobarFinalistas($num) {
		$voto = new VotaProfesional();
		$res = $voto->listarFinalistas();
		if(mysqli_num_rows($res) >= $num) return true;
		else return false;
    }

    /*  Recupera la informacion del ultimo concurso realizado.
    *   Return: Devuelve la informaion del ultimo concurso.
    */
	function concursoActual(){
		$concurso = new Concurso();
		return $concurso->recuperarUltimoConcurso();
	}

    /*  Inserta un nuevo miembro al jurado profesional
    *   Parametros:
    *       $login - login por el que se idenifica al usuario (tabla usuario y juradoprofesional).
    *		$password - contraseña asignada al usuario (tabla usuario).
    *		$email - email del usuario (tabla usuario).
    *		$nombre - nombre del jurado profesional (tabla juradoprofesional).
    *		$foto - foto del jurado profesional (tabla juradoprofesional).
    *		$reconocimientos - premios concedidos al jurado profesional (tabla juradoprofesional).
    *   Return: Devuelve TRUE si se ha podido insertar el las tablas usuario y juradoprofesional y en caso contrario FALSE.
    */
	function registrarJuradoProfesional($login,$password,$email,$nombre,$foto,$reconocimientos) {
		if ($foto != null) {
			move_uploaded_file($_FILES['fotojuradoprofesional']['tmp_name'],"../../img/juradoprofesional/".$login.".jpg");
			$usuario = new Usuarios();
			$jpro = new JuradoProfesional();
			$res1 = $usuario->insertar($login,$password,$email,"jpro");
			$res2 = $jpro->insertar($login,$foto,$nombre,$reconocimientos);
			return ($res1 && $res2);
		} else {
			$usuario = new Usuarios();
			$jpro = new JuradoProfesional();
			$res1 = $usuario->insertar($login,$password,$email,"jpro");
			$res2 = $jpro->insertar($login,$foto,$nombre,$reconocimientos);
			return ($res1 && $res2);
		}
	}


	/*  Inserta una nueva tupla a la tabla votaprofesional por cada jurado asignado a un pincho
	*   Parametros:
	*				$idpincho - clave primaria del pincho a asignar.
	*				$loginsJuradoProfesional - array con los login de cada jurado
	*   Return: Devuelve TRUE si se han podido insertar los datos.
	*/
	function asignarPinchosJuradoProfesional($idpincho,$loginsJuradoProfesional) {
		$asignar = new VotaProfesional();
		$asignar->pincho_idpincho = $idpincho;
		foreach ($loginsJuradoProfesional as $login) {
			$asignar->juradoprofesional_usuarios_login = $login;
			$res = $asignar->insertar($asignar);
			if(!$res) return $res;
		}
		return $res;
	}

    /*  Recupera los datos de una propuesta determinada.
    *   Parametros:
    *        $id - idpincho para la propuesta(pincho) de la que se quieren recuperar los datos.
    *   Return: Devuelve los datos del pincho identificado por $id.
    */
	function datosPropuestaGastronomica($id) {
		$pincho = new Pincho();
		$datos =  $pincho->recuperar($id);
		return $datos;
	}

	/*Registra un nuevo concurso (una nueva edición).Llama al método insertarEdicion de la clase concurso.
	Parametros:
        *       $edicion - Atributo a insertar, clave primario del concurso (edicion).
				*				$descripcion - Atributo a insertar, desciprción del concurso.
        *       $folleto - Atributo a insertar, folleto de concurso.
        *       $gastromapa - Atributo a insertar, gastromapa de concurso.
        *       $fechac - Atributo a insertar, fecha de incio de concurso.
        *       $fechaf - Atributo a insertar, fecha de finalización de concurso.
        *       $usuarios_login - Atributo a insertar, usuario de tipo organizador que gestiona concurso.
    Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
		*/
	function registrarEdicion($titulo,$descripcion,/*$folleto,$gastromapa,*/$fechac,$fechaf,$usuarios_login) {
		$concurso = new Concurso();
		$con = $concurso->recuperarUltimoConcurso();
		$fila = mysqli_fetch_assoc($con);
		$edicion = $fila['edicion'] + 1;

		move_uploaded_file($_FILES['folleto']['tmp_name'],"../../img/folleto/".$edicion."folleto.jpg");
		move_uploaded_file($_FILES['gastromapa']['tmp_name'],"../../img/gastromapa/".$edicion."gastromapa.jpg");

		$name_folleto = $edicion."folleto.jpg";
		$name_gastromapa = $edicion."gastromapa.jpg";

		$res1 = $concurso->insertarEdicion($titulo,$descripcion,$name_folleto,$name_gastromapa,$fechac,$fechaf,$usuarios_login);
		return ($res1);
	}

	/* Modificar los datos de la edición actual. Llama al método modificarEdicion de la clase concurso.
	Parametros:
        *       $edicion - Atributo a insertar, clave primario del concurso (edicion).
				*				$descripcion - Atributo a insertar, desciprción del concurso.
        *       $folleto - Atributo a insertar, folleto de concurso.
        *       $gastromapa - Atributo a insertar, gastromapa de concurso.
    Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
		*/
	function modificarEdicion($titulo,$descripcion) {
		$concurso = new Concurso();
		$con = $concurso->recuperarUltimoConcurso();
		$fila = mysqli_fetch_assoc($con);
		$edicion = $fila['edicion'];

		move_uploaded_file($_FILES['folleto']['tmp_name'],"../../img/folleto/".$fila['folleto']);
		move_uploaded_file($_FILES['gastromapa']['tmp_name'],"../../img/gastromapa/".$fila['gastromapa']);

		$res1 = $concurso->modificarEdicion($titulo,$descripcion,$edicion);
		return ($res1);
	}

?>

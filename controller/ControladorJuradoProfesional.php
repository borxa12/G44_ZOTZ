<?php

	include_once("../../loader.php");
	loadclasses("model","Usuarios.php");
	loadclasses("model","JuradoProfesional.php");
	loadclasses("model","VotaProfesional.php");
	loadclasses("model","Pincho.php");
	loadclasses("model","BD.php");

	/*  Permite a un usuario JuradoProfesional modificar sus datos
	*   Parametros:
	*		$id - Atributo a comprobar, contiene el login del usuario JuradoProfesional a modificar.
	*		$password - Atributo a modificar, contiene el password del usuario JuradoProfesional a modificar.
	*		$email - Atributo a modificar, contiene el email del usuario JuradoProfesional a modificar.
	*       $jp - Objeto con los nuevos datos del usuario JuradoProfesional
	*   Return: Devuelve TRUE si se han podido modificar los datos.
	*/
	function modificarDatosJuradoProfesional($id,$password,$email,$jp){
		$usuario = new Usuarios();
		$juradoProfesional = new JuradoProfesional();
		$res1 = $usuario->modificar($id,$password,$email);
		$res2 = $juradoProfesional->modificar($id,$jp);
		return ($res1 && $res2);
	}


	/*  Elimina un usuario JuradoProfesional.
	*   Parametros:
	*       $login - Atributo a comprobar, login del usuario que se quiere eliminar.
	*   Return: Devuelve TRUE si se ha podido eliminar el usuario JuradoProfesional.
	*/
	function eliminarJuradoProfesional($login){
		$usuario = new Usuarios();
		$juradoProfesional = new JuradoProfesional();
		$res1 = $usuario->recuperar($login);
		$res2 = $juradoProfesional->recuperar($login);
		if($res1 && $res2){
			$res1 = $usuario->eliminar($login);
			$res2 = $juradoProfesional->eliminar($login);
		}
		return ($res1 && $res2);
	}

	/*  Obtiene los datos de un pincho a evaluar por el JuradoProfesional.
	*   Parametros:
	*       $id - Atributo a comprobar, id del pincho a recuperar.
	*   Return: Devuelve un objeto pincho si se han podido recuperar los datos.
	*/
	function recuperarPincho($id){
		$pincho = new Pincho();
		return $pincho->recuperar($id);
	}

	/*  Obtiene una lista con los pinchos que el jurado puede votar en la 1º ronda.
	*   Parametros:
	*       $login - Atributo a comprobar, login del jurado que va a votar.
	*   Return:devuelve una lista las tuplas de votaprofesional que coincidan.
	*/
	function listar1Ronda($login){
		$vp = new VotaProfesional();
		return $vp->listarPorJurado1Ronda($login);

	}

	/*  Modifica el valor del campo voto1round de la tupla que coincida.
	*   Parametros:
	*       $id - Atributo a comprobar, id del pincho a votar.
	*       $login - Atributo a comprobar, login del jurado que va a votar.
	*       $nota - Atributo a modificar, nota que se le va asignar al campo voto1round.
	*   Return: Devuelve true si se realiza la modificación, false en caso contrario.
	*/
	function votar1Ronda($nota, $login, $id) {
		$vp = new VotaProfesional();
		return $vp->votar1Ronda($nota, $login, $id);
	}

	/*  Obtiene una lista con los pinchos que el jurado puede votar en la 2º ronda.
	*   Parametros:
	*       $login - Atributo a comprobar, login del jurado que va a votar.
	*   Return:devuelve una lista las tuplas de votaprofesional que coincidan.
	*/
	function listar2Ronda($login){
		$vp = new VotaProfesional();
		return $vp->listarPorJurado2Ronda($login);
	}

	/*  Comprueba que el jurado profesional tenga el pincho asignado.
	*   Parametros:
	*       $pincho - Atributo a comprobar, pincho que debería estar asignado.
	*				$jpro - Atributo a comprobar, jurado profesional que debería tener en pincho asignado.
	*   Return: devuelve TRUE en caso de que exista dicha asignación y FALSE en caso contrario.
	*/
	function comprobarExistenciaVotacion($pincho,$jpro) {
		$vp = new VotaProfesional();
		return $vp->comprobarExistenciaPinchoJPro($pincho,$jpro);
	}

	/*  Inserta una nueva tupla a la tabla votaprofesional
	*   Parametros:
	*        $pincho - Atributo a insetar, identificador del pincho.
	*        $jpro - Atributo a insertar, identificador del jurado profesional.
	*   Return: Devuelve TRUE si se han podido modificar los datos.
	*/
	function insertarJuradoAusente($pincho,$jpro) {
		$vp = new VotaProfesional();
		return $vp->insertarJuradoAusente($pincho,$jpro);
	}

	/*  Modifica el valor del campo voto2round de la tupla que coincida.
	*   Parametros:
	*       $id - Atributo a comprobar, id del pincho a votar.
	*       $login - Atributo a comprobar, login del jurado que va a votar.
	*       $nota - Atributo a modificar, nota que se le va asignar al campo voto2round.
	*   Return: Devuelve true si se realiza la modificación, false en caso contrario.
	*/
	function votar2Ronda($nota, $login, $id) {
		$vp = new VotaProfesional();
		return $vp->votar2Ronda($nota, $login, $id);
	}

	/*  Recupera los pinchos finalistas.
	*   Return: Devuelve los pinchos finalistas, FALSE en caso contrario.
	*/
	function recuperarFinalistas(){
		$votopro = new VotaProfesional();
		$res = $votopro->recuperarFinalistas();
		return $res;
	}
?>

<?php

	require_once '../model/Establecimiento.php';
	require_once '../model/CodigoPincho.php';
	require_once '../model/Establecimiento.php';
	require_once '../model/JuradoProfesional.php';
	require_once '../model/Pincho.php';
	require_once '../model/Usuarios.php';
	require_once '../model/VotaProfesional.php';
	require_once '../model/BD.php';

	/*  Permite a un usuario JuradoProfesional modificar sus datos
	*   Parametros:
					$id - Atributo a comprobar, contiene el login del usuario JuradoProfesional a modificar.
					$password - Atributo a modificar, contiene el password del usuario JuradoProfesional a modificar.
					$email - Atributo a modificar, contiene el email del usuario JuradoProfesional a modificar.
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
	*       id - Atributo a comprobar, id del pincho a recuperar.
	*   Return: Devuelve un objeto pincho si se han podido recuperar los datos.
	*/
	function recuperarPincho($id){
		$pincho = new Pincho();
		return $pincho->recuperar($id);
	}
?>

<?php

	loadclasses("model","Pincho.php");
	loadclasses("model","BD.php");
	loadclasses("model","JuradoProfesional.php");
	loadclasses("model","CodigoPincho.php");
	loadclasses("model","Usuarios.php");
	loadclasses("model","VotaProfesional.php");

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

	function listarPinchosSinAceptar(){
		$pincho = new Pincho();
		$lista = $pincho->listarSinGestionar();
		return $lista;
	}

    function seleccionarFinalistas($num) {
		$pincho = new VotaProfesional();
		$res = $pincho->eleccionFinalistas($num);
		return $res;
	}

    function comprobarParticipantes($num) {
		$pincho = new Pincho();
		$res = $pincho->listar();
		if(mysqli_num_rows($res) >= $num) return true;
		else return false;
    }
	
	function listarJuradoProfesional(){
		$jp = new JuradoProfesional();
		$lista = $jp->listar();
		return $lista;
	}

	function registrarJuradoProfesional($login,$password,$email,$nombre,$foto,$reconocimientos) {

			$usuario = new Usuarios();
			$jpro = new JuradoProfesional();
			$res1 = $usuario->insertar($login,$password,$email,"jpro");
			$res2 = $jpro->insertar($login,$foto,$nombre,$reconocimientos);
			return ($res1 && $res2);
	}


	/*  Inserta una nueva tupla a la tabla votaprofesional por cada jurado asignado a un pincho
	*   Parametros:
	*		$idpincho - clave primaria del pincho a asignar.
	*		$loginsJuradoProfesional - array con los login de cada jurado
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

	function datosPropuestaGastronomica($id) {
		$pincho = new Pincho();
		$datos =  $pincho->recuperar($id);
		return $datos;
	}
?>

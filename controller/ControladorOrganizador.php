<?php

	require_once '../model/Establecimiento.php';
	require_once '../model/CodigoPincho.php';
	require_once '../model/Establecimiento.php';
	require_once '../model/JuradoProfesional.php';
	require_once '../model/Pincho.php';
	require_once '../model/Usuarios.php';
	require_once '../model/VotaProfesional.php';

	public function revisarPinchos() {

	}

    public function recuperarPincho() {

    }

    public function seleccionarPropuesta() {

	}

    public function aceptarPropuesta() {

	}

    public function denegarPropuesta() {

	}

    public function registrarPincho() {

    }

    public function eliminarPincho() {

    }

    public function seleccionarFinalistas(int $num) {

	}

    public function comprobarParticipantes(int $num) {

    }

    public function elegirFinalistas() {

    }

    public function recuperarJuradoProfesional() {

    }

    public function registrarJuradoProfesional($juradoprofesional) {

    }

    public function addJuradoProfesional() {

    }

		/*  Inserta una nueva tupla a la tabla votaprofesional por cada jurado asignado a un pincho
		*   Parametros:
						$idpincho - clave primaria del pincho a asignar.
						$loginsJuradoProfesional - array con los login de cada jurado
		*   Return: Devuelve TRUE si se han podido insertar los datos.
		*/
    public function asignarPinchosJuradoProfesional($idpincho,$loginsJuradoProfesional) {
			$asignar = new VotaProfesional();
			$asignar->pincho_idpincho = $idpincho;
			foreach ($loginsJuradoProfesional as $login) {
				$asignar->juradoprofesional_usuarios_login = $login;
				$res = $asignar->insertar($asignar);
				if(!$res) return $res;
			}
			return $res;
    }



?>

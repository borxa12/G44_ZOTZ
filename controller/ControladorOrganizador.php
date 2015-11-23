<?php

	require_once '../model/Establecimiento.php';
	require_once '../model/CodigoPincho.php';
	require_once '../model/Establecimiento.php';
	require_once '../model/JuradoProfesional.php';
	require_once '../model/Pincho.php';
	require_once '../model/Usuarios.php';
	require_once '../model/VotaProfesional.php';
	require_once '../model/BD.php';

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
    function listarPinchosSinAceptar(){
		
		$pincho = new Pincho();
		$lista = $pincho->listarSinGestionar();
		return $lista;
	}

    public function seleccionarFinalistas(int $num) {

	}

    public function comprobarParticipantes(int $num) {

    }

    public function elegirFinalistas() {

    }

    public function recuperarJuradoProfesional() {

    }

    public function registrarJuradoProfesional() {
    	
    	$login = $_POST["loginjuradoprofesional"];
		$nombre = $_POST["nombrejuradoprofesional"];
		$email=$_POST["emailjuradoprofesional"];
		$password=$_POST["passwordjuradoprofesional"];
		$reconocimientos=$_POST["reconocimientos"];
 
		$usuario = new Usuarios();
		$juradoprofesional = new JuradoProfesional();
		$juradoprofesional->usuarios_login=$login;
		$juradoprofesional->nombrejuradoprofesional=$nombre;
		$juradoprofesional->recomientos=$reconocimientos;
		//$juradoprofesional->fotojuradoprofesional=$foto;
		
		$usuarios->insertar($login, $password, $email, "jpro");
		$juradoprofesional->insertar($juradoprofesional);
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

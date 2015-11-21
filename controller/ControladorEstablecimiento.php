<?php

	require_once '../model/BD.php';
	require_once '../model/Establecimiento.php';
	require_once '../model/CodigoPincho.php';
	require_once '../model/Establecimiento.php';
	require_once '../model/JuradoProfesional.php';
	require_once '../model/Pincho.php';
	require_once '../model/Usuarios.php';
	require_once '../model/VotaProfesional.php';

	 function altaEstablecimiento($establecimiento) {

	}

	 function bajaEstablecimiento($establecimiento) {

	}

	 function eliminarEstablecimiento($establecimiento) {

	}

	 function modificarDatosEstablecimiento($establecimiento) {

	}

	 function enviarFormulario($datos) {

	}

	 function add($establecimiento) {

	}

	 function recuperarDatosEstablecimiento() {
		return $datosEstablecimiento;
	}

	 function introducirDatos() {

	}

	 function validarDatos() {

	}

	 function enviarPropuestaGatronomica() {

	}

	 function recuperarDatosPincho() {

	}

	 function modificarDatosPincho() {

	}

	/* Esta funcion llama a codigoAleatorio() para generar un código nuevo.
	*  Si el código no es válido vuelve a generar otro, así hasta que encuentre uno válido.
	*  Llama a relacionarCodigo para añadirlo a la BD.
	*/
	 function generarCodigos($estlogin, $ed) {
	 	do{
	 		$codigo = codigoAleatorio();
	 	}while (validarCodigo($codigo) == false);
	 	relacionarCodigo($estlogin, $codigo, $ed);
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
	 	$data = mysqli_fetch_assoc($res);
        $id = $data['idpincho'];
        //$likes = 'NULL';
        return $codigopincho->insertar($cod, $estlogin, $id);
	}

	 function cerrarSesion() {

	}

//echo generarCodigos('establecimiento1',1);
?>

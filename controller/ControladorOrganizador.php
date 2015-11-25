<?php

	loadclasses("model","Pincho.php");
	loadclasses("model","BD.php");
	loadclasses("model","JuradoProfesional.php");
	loadclasses("model","CodigoPincho.php");
	loadclasses("model","Usuarios.php");
	loadclasses("model","VotaProfesional.php");

/*Método que gestiona una propuesta. Si el organizador la acepta, pone le campo aceptado a 'A' y si la rechaza
pone el campo aceptado a 'D'. Por defecto este campo está a 'N'.
Parámetros:
	$id: es la id del pincho que se quiere gestionar.
	$a: es la opción elegida por el organizador. Si es aceptar esta variable vale 'A' y si es denegar vale 'D'.
Return: devuelve el pincho con su campo aceptado modificado.
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
	
	/*Función que lista aquellos pinchos que estean sin gestionar, es decir que tengan el campo aceptado a N. 
	Son todos aquellos pinchos que el organizador tiene que revisar para aceptar o denegar. 
	Sin parámetros. 
	Return: devuelve un array con los pinchos sin gestionar. 
	*/	

   function listarPinchosSinAceptar(){
		$pincho = new Pincho();
		$lista = $pincho->listarSinGestionar();
		return $lista;
   }
   
 
	/*  Recupera los finalistas de la BD, es decir, los pinchos con mejor media de las notas del jurado profesional. 
	Parametros: 
	$num - Número máximo de finalistas. 
	Return: Devuelve un conjunto de datos y en caso contrario FALSE. */


    function seleccionarFinalistas($num) {
		$pincho = new VotaProfesional();
		$res = $pincho->eleccionFinalistas($num);
		return $res;
	}
	
	/*Comprueba si el número de participantes es mayor que el número de pinchos finalistas.
	Parámetros.
		$num: es el número de pincho seleccionados como finalistas.
	Return: TRUE si es mayor y FALSE si no lo es.
	*/

    function comprobarParticipantes($num) {
		$pincho = new Pincho();
		$res = $pincho->listar();
		if(mysqli_num_rows($res) >= $num) return true;
		else return false;
    }
	    /*Lista el jurado profesional.
	    Sin parámetros.
	    Return: Devuelve un array con todos los miembros del jurado profesional. 
	    */
	
   function listarJuradoProfesional(){
	$jp = new JuradoProfesional();
	$lista = $jp->listar();
	return $lista;
    }
    
	    /*Inserta un usuario jurado profesional el la BD. Para ello llama al método insertar() de JuradoProfesional.php y al método 
	    insertar() de Usuario.php que son los que hacen la inserción directamente en la BD. 
	    Parámetros:
	    	$login: es el login de usuario que a su vez coindice con el login de jurado profesional.
	    	$password: es la contraseña de usuario que a su vez coindice con el login de jurado profesional.
	    	$email: es el email de usuario que a su vez coindice con el login de jurado profesional.
	    	$nombre: es el nombre del jurado profesional.
		$foto: es la foto del jurado profesional.
		$reconocimientos: son los reconocimientos del jurado profesional.
		Por defecto el tipo es 'jpro' ya que el usuario es de tipo juradoprofesional.
	   Return: devuelve el usuario registrado en la tabla usuarios y en la tabla juradoprofesional.
		    */

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
	
	/*Devuelve los datos de un pincho dado su ID. LLama al método recuperar() de la clase Pincho.php que es el que hace
	el SELECT en la base de datos.
	Parámetros:
		$id: es la id del pincho del que se quiere obtener información.
	Return: devuelve un array con los datos del pincho indicado.
	*/

	function datosPropuestaGastronomica($id) {
		$pincho = new Pincho();
		$datos =  $pincho->recuperar($id);
		return $datos;
	}
?>

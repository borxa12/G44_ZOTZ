<?php

    class Pincho {

    	//Atributos
        public $idpincho;
        public $nombrepincho;
        public $fotopincho;
        public $decripcionpincho;
        public $ingredientesp;
        public $precio;
        public $aceptado;
        public $concurso_edicion;
        public $establecimiento_usuarios_login;

        /* Lista los identificadores de los pinchos y sus atributos.
        *  Sin parametros.
        *  Return: Devuelve los datos del pincho sin tratar o FALSE en caso de error.
        */
        public function listar() {
            $db = new BD();
            $sentencia = "SELECT * FROM pincho";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
            $db->desconectar();
        }

        /* Lista los pinchos de la última edición disponible.
    	*  Sin parametros.
    	*  Return: Devuelve los datos de los últimos pinchos o FALSE en caso contrario.
    	*/
        public function listarUltimos() {
            $db = new BD();
            $sentencia = "SELECT * FROM concurso ORDER BY edicion DESC LIMIT 1";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res) == 0) return false;
            else {
                $res2 = mysqli_fetch_assoc($res);
                    $sentencia2 = "SELECT * FROM pincho WHERE aceptado = 'A' AND concurso_edicion='".$res2['edicion']."'";
                $res3 = mysqli_query($db->connection,$sentencia2);
                if(mysqli_num_rows($res3) == 0) return false;
                return $res3;
            }
        }

        /* Lista los identificadores de los pinchos y sus atributos segun el establecimiento.
        *  Sin parametros.
        *  Return: Devuelve los datos del pincho sin tratar o FALSE en caso de error.
        */
        public function listarPorEstablecimiento($est) {
            $db = new BD();
            $sentencia = "SELECT * FROM pincho WHERE establecimiento_usuarios_login='".$est."' ORDER BY concurso_edicion DESC";
            $res = mysqli_query($db->connection,$sentencia);
           $db->desconectar();
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
        }

        /* Lista los pinchos filtrados por id (idpincho).
        *  Parametros:
        *       $id - Clave primaria de pinchos (idpincho).
        *  Return: Devuelve los datos del pincho sin tratar o FALSE en caso de error.
        */
        public function recuperar($id) {
            $db = new BD();
            $sentencia = "SELECT * FROM pincho WHERE idpincho='".$id."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
            $db->desconectar();
        }

        /* Recupera una tupla de pincho con el login indicado y la edicion.
        *  Parametros:
        *       $login - atributo de pinchos (establecimiento_usuarios_login).
        *       $ed - atributo de pinchos (concurso_edicion).
        *  Return: Devuelve los datos del pincho sin tratar o FALSE en caso de error.
        */
        public function recuperarActualEstablecimiento($login, $ed) {
            $db = new BD();
            $sentencia = "SELECT * FROM pincho WHERE establecimiento_usuarios_login='".$login."' AND concurso_edicion='".$ed."'AND aceptado='A'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
            $db->desconectar();
        }

        /* Elimina una tupla de pinchos con el id indicado.
        *  Parametros:
        *       $id - Clave primaria de la tabla (id).
        *  Return: Devuelve TRUE si la tupla se elimina correctamente o FALSE en caso contrario.
        */
        public function eliminar($id) {
            $db = new BD();
            $sentencia = "DELETE FROM pincho WHERE idpincho='".$id."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Modifica una tupla de pincho con el id indicado.
        *  Parametros:
        *       $login - Clave primaria del usuario (login).
        *       $password - Atributo a modificar, contraseña del usuario especificado.
        *       $email - Atributo a modificar, email del usuario especificado.
        *   Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
         public function modificar($idpincho, $nombrepincho, $fotopincho, $descripcionpincho, $ingredientesp, $precio, $aceptado) {
            $db = new BD();
            $sentencia = "UPDATE pincho SET nombrepincho='".$nombrepincho."', fotopincho='".$fotopincho."', descripcionpincho='".$descripcionpincho."', ingredientesp='".$ingredientesp."', precio='".$precio."', aceptado='".$aceptado."' WHERE idpincho='".$idpincho."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Inerta una tupla de pincho con los parametros indicado.
        *  Parametros:
        *       $idpincho - Atributo a insertar, clave primario del pincho (idpincho).
        *       $nombrepincho - Atributo a insertar, nombre del picho.
        *       $fotopincho - Atributo a insertar, foto del pincho.
        *       $descripcionpincho - Atributo a insertar, descripcion del pincho.
        *       $ingredientesp - Atributo a insertar, ingredientes del pinco.
        *       $precio - Atributo a insertar, tipo de usuario (jpop, jpro, org, est).
        *       $aceptado - Atributo a insertar, indica si el pincho ha sido aceptado en el concurso.
        *       $concurso_edicion - Atributo a insertar, indica la edicion en la que participa el pincho.
        *       $establecimiento_usuarios_login - Atributo a insertar, login del establecimiento al que pertenece el pincho.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function insertar($nombrepincho, $fotopincho, $descripcionpincho, $ingredientesp, $precio, $aceptado, $concurso_edicion, $establecimiento_usuarios_login) {
            $db = new BD();
            $sentencia = "INSERT INTO pincho (idpincho, nombrepincho, fotopincho, descripcionpincho, ingredientesp, precio, aceptado, concurso_edicion, establecimiento_usuarios_login)
            VALUES( DEFAULT, '".$nombrepincho."', '".$fotopincho."', '".$descripcionpincho."', '".$ingredientesp."','".$precio."', '".$aceptado."', '".$concurso_edicion."', '".$establecimiento_usuarios_login."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*	Funcion que lista aquellos pinchos que estean sin gestionar, es decir que tengan el campo aceptado a N.
        *	Son todos aquellos pinchos que el organizador tiene que revisar para aceptar o denegar.
        *	Sin parámetros.
        *	Return: devuelve un array con los pinchos sin gestionar.
        */
        public function listarSinGestionar($edicion){
            $db = new BD();
            $sentencia = "SELECT * FROM pincho WHERE aceptado='N' AND concurso_edicion='".$edicion."'";
            $res = mysqli_query($db->connection,$sentencia);
			      $db->desconectar();
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;

		}

        /*  Lista los pinchos que han sido aceptados para la edicion indicada($ed).
        *   Parametros:
        *        $idd - edicion para la cual se quieren listar los pinchos aceptados.
        *   Return: Devuelve una lista con los pinchos aceptados en la edicion $ed.
        */
        public function listarAceptados($ed){
    		$db = new BD();
            $sentencia = "SELECT * FROM pincho WHERE aceptado='A' AND concurso_edicion='".$ed."'";
            $res = mysqli_query($db->connection,$sentencia);
    		$db->desconectar();
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
    	}

		/* Comprueba el número de pinchos que tiene registrados un estableciemiento dado en una edición dada del concurso.
		Parámetros
			$edicion: es la edición del concurso para la que se quiere comprobar los pinchos registrados por el establecimiento.
			$est: es el establecimiento del que se quiere comprobar los pinchos registrados. Es el login del establecimiento.
		Return: devuelve el número de pinchos registrados.
		*/
		public function comprobarPropuestas($edicion,$est){
	          $db = new BD();
	          $sentencia = "SELECT COUNT(idpincho) AS contador FROM pincho WHERE concurso_edicion='".$edicion."' AND establecimiento_usuarios_login='".$est."' GROUP BY concurso_edicion";
	          $res = mysqli_query($db->connection,$sentencia);
	          $db->desconectar();
	          return $res;
	    }
    }

    ?>

<?php

    class Pincho {
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
            $sentencia = "SELECT * FROM pincho WHERE establecimiento_usuarios_login='".$login."' AND concurso_edicion='".$ed."'AND aceptado=1";
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
        
        public function listarSinGestionar(){
			$db = new BD();
            $sentencia = "SELECT * FROM pincho WHERE aceptado='N'";
            $res = mysqli_query($db->connection,$sentencia);
			$db->desconectar();
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
            
		}
	public function comprobarPropuestas($edicion,$est){
          $db = new BD();
          $sentencia = "SELECT COUNT(idpincho) AS contador FROM pincho WHERE concurso_edicion='".$edicion."' AND establecimiento_usuarios_login='".$est."' GROUP BY concurso_edicion";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
    }

    ?>

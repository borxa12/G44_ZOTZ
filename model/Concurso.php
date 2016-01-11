<?php

    class Concurso {

        // Atributos
        public $edicion;
        public $folleto;
        public $gastromapa;
        public $fechac;
        public $fechaf;
        public $usuarios_login;

        /* Recupera una tupla del ultimo concurso realizado.
        *  Return: Devuelve la tupla sin tratar o FALSE en caso contrario.
        */
        public function recuperarUltimoConcurso(){
          $db = new BD();
          $sentencia = "SELECT * FROM concurso ORDER BY edicion DESC LIMIT 1";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
              return $res;

        }

        /* Lista los concursos.
        *  Sin parametros.
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function listar() {
            $db = new BD();
            $res = $db->consulta("SELECT * FROM concurso");
            if(mysqli_num_rows($res) == 0) {
                return false;
            } else {
                return $res;
            }
            $db->desconectar();
        }

        /* Recupera una tupla de concurso con el ID indicado.
        *  Parametros:
        *       $id - Clave primaria del concurso (edicion).
        *  Return: Devuelve la tupla sin tratar o FALSE en caso contrario.
        */
        public function recuperar($id) {
            $db = new BD();
            $res = mysqli_query($db->connection,"SELECT * FROM concurso WHERE edicion="."'$id'");
            if(mysqli_num_rows($res) == 0) {
                return false;
            } else {
                return $res;
            }
            $db->desconectar();
        }

        /* Elimina una tupla de concurso con el ID indicado.
        *  Parametros:
        *       $id - Clave primaria del concurso (edicion).
        *  Return: Devuelve TRUE si la tupla se elimina correctamente o FALSE en caso contrario.
        */
        public function eliminar($id) {
            $db = new BD();
            $res = mysqli_query($db->connection,"DELETE FROM concurso WHERE edicion="."'$id'");
            $db->desconectar();
            return $res;
        }

        /* Modifica una tupla de concurso con el ID indicado.
        *  Parametros:
        *       $id - Clave primaria del concurso (edicion).
        *       $edicion - Atributo a modificar, clave primario del concurso (edicion).
        *       $folleto - Atributo a modificar, folleto de concurso.
        *       $gastromapa - Atributo a modificar, gastromapa de concurso.
        *       $fechac - Atributo a modificar, fecha de incio de concurso.
        *       $fechaf - Atributo a modificar, fecha de finalización de concurso.
        *       $usuarios_login - Atributo a modificar, usuario de tipo organizador que gestiona concurso.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function modificar($id,$edicion,$folleto,$gastromapa,$fechac,$fechaf,$usuarios_login) {
            $db = new BD();
            $sentencia = "UPDATE concurso SET edicion='".$edicion."', folleto='".$folleto."', gastromapa='".$gastromapa."', fechac='".$fechac."',
                fechaf='".$fechaf."', usuarios_login='".$usuarios_login."' WHERE edicion='".$id."' ";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

          /* Inserta una tupla de concurso con los parametros indicado.
        *  Parametros:
        *       $edicion - Atributo a insertar, clave primario del concurso (edicion).
        *       $folleto - Atributo a insertar, folleto de concurso.
        *       $gastromapa - Atributo a insertar, gastromapa de concurso.
        *       $fechac - Atributo a insertar, fecha de incio de concurso.
        *       $fechaf - Atributo a insertar, fecha de finalización de concurso.
        *       $usuarios_login - Atributo a insertar, usuario de tipo organizador que gestiona concurso.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
		    function insertarEdicion($tit,$desc,$foll,$gastr,$fc,$ff,$usr_log) {
  			  $db = new BD();
  			  $sentencia = "INSERT INTO `concurso` (`edicion`, `titulo`, `descripcion`, `folleto`, `gastromapa`, `fechac`, `fechaf`, `usuarios_login`)
  				    VALUES (NULL, '".$tit."', '".$desc."', '".$foll."',  '".$gastr."',  '".$fc."',  '".$ff."',  '".$usr_log."')";
  			  $res = mysqli_query($db->connection,$sentencia);
  			  $db->desconectar();
  			  return $res;
        }

        /* Modifica los datos del último concurso según los parámetros indicados.
      *  Parametros:
      *       $edicion - Atributo a insertar, clave primario del concurso (edicion).
      *       $folleto - Atributo a insertar, folleto de concurso.
      *       $gastromapa - Atributo a insertar, gastromapa de concurso.
      *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
      */
      function modificarEdicion($tit,$desc,$ed) {
        $db = new BD();
        $sentencia = "UPDATE `concurso` SET `titulo` = '".$tit."', `descripcion` = '".$desc."' WHERE `edicion` = ".$ed;
        $res = mysqli_query($db->connection,$sentencia);
        $db->desconectar();
        return $res;
      }

    }

?>

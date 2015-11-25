<?php
    class JuradoProfesional {
        
        public $usuarios_login;
        public $fotojuradoprofesional=null;
        public $nombrejuradoprofesional;
        public $reconocimientos=null;

        /*  Lista las asignaciones de pincho a jurado profesional
        *   Return: Devuelve la lista con los datos.
        */
        public function listar() {
          $db = new BD();
          $sentencia = "SELECT * FROM juradoprofesional";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
        /*  Recupera los datos de la asignacione de pincho a jurado profesional
        *   Parametros:
        *        $id - id del pincho de la asignacion a recuperar.
        *   Return: Devuelve los datos de la asignacion.
        */
        public function recuperar($id) {
          $db = new BD();
          $sentencia = "SELECT * FROM juradoprofesional WHERE usuarios_login='".$id."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }

        /*  ELimina una tupla de la tabla juradoprofesional.
        *   Parametros:
        *        $login - login del jurado profesional a eliminar.
        *   Return: Devuelve TRUE si se han podido eliminar los datos, FALSE en caso contrario.
        */
        public function eliminar($login) {
            $db = new BD();
            $sentencia = "DELETE FROM `juradoprofesional` WHERE `usuarios_login`='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Modifica una tupla en la tabla juradoprofesional.
        *   Parametros:
        *        $objeto - Array con los atributos a modificar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function modificar($usuarios_login,$fotojuradoprofesional,$nombrejuradoprofesional,$reconocimientos) {
          $db = new BD();
          $sentencia = "UPDATE juradoprofesional SET usuarios_login='".$usuarios_login."',fotojuradoprofesional='".$fotojuradoprofesional."',nombrejuradoprofesional='".$nombrejuradoprofesional."',reconocimientos='".$reconocimientos."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }

        /*  Inserta una nueva tupla a la tabla votaprofesional
        *   Parametros:
        *        $objeto - Array con los atributos de la nueva asignacion de pincho a jurado profesional a insertar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function insertar($login,$foto,$nombre,$reconocimientos) {
          $db = new BD();
          $sentencia = "INSERT INTO `juradoprofesional` (`usuarios_login`, `fotojuradoprofesional`, `nombrejuradoprofesional`, `reconocimientos`)
            VALUES ('".$login."', '".$foto."', '".$nombre."', '".$reconocimientos."')";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
    }

?>

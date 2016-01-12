<?php

    class VotaProfesional {

        // Atributos
        public $pincho_idpincho;
        public $juradoprofesional_usuarios_login;
        public $votoprofesional=null;

        /*  Lista las asignaciones de pincho a jurado profesional
        *   Return: Devuelve la lista con los datos.
        */
        public function listar() {
            $db = new BD();
            $sentencia = "SELECT * FROM votaprofesional";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Lista los pinchos finalistas
        *   Return: Devuelve la lista con los datos.
        */
        public function listarFinalistas() {
            $db = new BD();
            $sentencia = "SELECT * FROM votaprofesional WHERE finalista = 1";
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
            $sentencia = "SELECT * FROM votaprofesional WHERE pincho_idpincho='".$id."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Recupera los identificadores de pincho finalistas.
        *   Sin parametros.
        *   Return: Devuelve los datos de vota profesional para los finalistas.
        */
        public function recuperarFinalistas() {
            $db = new BD();
            $sentencia = "SELECT `pincho_idpincho`, AVG(`voto1round`) AS media FROM `votaprofesional` WHERE `finalista`=1 GROUP BY `pincho_idpincho` ORDER BY 2 DESC";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Recupera los identificadores de pincho ganadores.
        *   Sin parametros.
        *   Return: Devuelve los datos de vota profesional para los ganadores.
        */
        public function recuperarGanadores() {
            $db = new BD();
            $sentencia = "SELECT `pincho_idpincho`, AVG(`voto2round`) AS media FROM `votaprofesional` WHERE `ganador`=1 GROUP BY `pincho_idpincho` ORDER BY 2 DESC";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Elimina una tupla de la tabla votaprofesional
        *   Parametros:
        *        $id - id del pincho de la asignacion a eliminar.
        *        $login - login del jurado de la asignacion a eliminar
        *   Return: Devuelve TRUE si se han podido eliminar los datos.
        */
        public function eliminar($id,$login) {
            $db = new BD();
            $sentencia = "DELETE FROM votaprofesional WHERE pincho_idpincho='".$id."' AND juradoprofesional_usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Modifica una tupla en la tabla votaprofesional
        *   Parametros:
        *        $objeto - Array con los atributos a modificar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function modificar($objeto) {
            $db = new BD();
            $sentencia = "UPDATE votaprofesional SET pincho_idpincho='".$objeto->pincho_idpincho."',juradoprofesional_usuarios_login'".$objeto->juradoprofesional_usuarios_login."',votoprofesional='".$objeto->votoprofesional."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Inserta una nueva tupla a la tabla votaprofesional
        *   Parametros:
        *        $objeto - Array con los atributos de la nueva asignacion de pincho a jurado profesional a insertar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function insertar($objeto) {
            $db = new BD();
            $sentencia = "INSERT INTO votaprofesional(pincho_idpincho,juradoprofesional_usuarios_login) VALUES('".$objeto->pincho_idpincho."','".$objeto->juradoprofesional_usuarios_login."')";
            $res = mysqli_query($db->connection,$sentencia);
            echo $sentencia;
            $db->desconectar();
            return $res;
        }

        /*  Recupera los finalistas de la BD, es decir, los pinchos con mejor media de las notas del jurado profesional en primera ronda.
        *   Parametros:
        *        $num - Número máximo de finalistas.
        *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
        */
        public function eleccionFinalistas($num) {
            $db = new BD();
            $sentencia1 = "SELECT `pincho_idpincho`, AVG(`voto1round`) AS media FROM votaprofesional WHERE voto1round IS NOT NULL GROUP BY 1 ORDER BY 2 DESC LIMIT $num";
            $res1 = mysqli_query($db->connection,$sentencia1);
            if(mysqli_num_rows($res1) == 0) return false;
            while($r = mysqli_fetch_assoc($res1)) {
                $sentencia2 = "UPDATE `votaprofesional` SET `finalista` = 1 WHERE `pincho_idpincho`='".$r['pincho_idpincho']."'";
                $res2 = mysqli_query($db->connection,$sentencia2);
            }
            $db->desconectar();
            return true;
        }

        /*  Recupera los finalistas de la BD, es decir, los pinchos con mejor media de las notas del jurado profesional en segunda ronda.
        *   Parametros:
        *        $num - Número máximo de finalistas.
        *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
        */
        public function eleccionGanadores($num) {
            $db = new BD();
            $sentencia1 = "SELECT `pincho_idpincho`, AVG(`voto2round`) AS media FROM votaprofesional WHERE `finalista` = 1 AND voto2round IS NOT NULL GROUP BY 1 ORDER BY 2 DESC LIMIT $num";
            $res1 = mysqli_query($db->connection,$sentencia1);
            if(mysqli_num_rows($res1) == 0) return false;
            while($r = mysqli_fetch_assoc($res1)) {
                $sentencia2 = "UPDATE `votaprofesional` SET `ganador` = 1 WHERE `pincho_idpincho`='".$r['pincho_idpincho']."'";
                $res2 = mysqli_query($db->connection,$sentencia2);
            }
            $db->desconectar();
            return true;
        }

        /*  Modifica una tupla en la tabla votaprofesional
        *   Parametros:
        *        $nota - nota que se le va asignar al campo voto1round
        *        $id - id del pincho a votar
        *        $login - login del jurado que ha votado
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function votar1Ronda($nota, $login, $id) {
            $db = new BD();
            $sentencia = "UPDATE votaprofesional SET voto1round='".$nota."' WHERE pincho_idpincho='".$id."' AND juradoprofesional_usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Lista los pinchos asignados a un jurado
        *   Parametros:
        *        $login -login del jurado del que se quieren recuperar sus pinchos.
        *   Return: Devuelve la lista con los datos.
        */
        public function listarPorJurado1Ronda($login) {
            $db = new BD();
            $sentencia = "SELECT * FROM votaprofesional WHERE juradoprofesional_usuarios_login = '".$login."' AND (finalista=0 OR finalista IS NULL)AND (ganador=0 OR ganador IS NULL) AND voto1round IS NULL AND voto2round IS NULL";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Modifica una tupla en la tabla votaprofesional
        *   Parametros:
        *        $nota - nota que se le va asignar al campo voto2round
        *        $id - id del pincho a votar
        *        $login - login del jurado que ha votado
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function votar2Ronda($nota, $login, $id) {
            $db = new BD();
            $sentencia = "UPDATE votaprofesional SET voto2round='".$nota."' WHERE pincho_idpincho='".$id."' AND juradoprofesional_usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Lista los pinchos asignados a un jurado
        *   Parametros:
        *        $login -login del jurado del que se quieren recuperar sus pinchos.
        *   Return: Devuelve la lista con los datos.
        */
        public function listarPorJurado2Ronda($login) {
            $db = new BD();
            $sentencia = "SELECT * FROM votaprofesional WHERE finalista=1 AND (ganador=0 OR ganador IS NULL) AND voto2round IS NULL AND juradoprofesional_usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /*  Comprueba que el jurado profesional tenga el pincho asignado.
      	*   Parametros:
      	*       $pincho - Atributo a comprobar, pincho que debería estar asignado.
      	*				$jpro - Atributo a comprobar, jurado profesional que debería tener en pincho asignado.
      	*   Return: devuelve TRUE en caso de que exista dicha asignación y FALSE en caso contrario.
      	*/
        public function comprobarExistenciaPinchoJPro($pincho,$jpro) {
          $db = new BD();
          $sentencia = "SELECT * FROM votaprofesional WHERE pincho_idpincho='".$pincho."' AND juradoprofesional_usuarios_login='".$jpro."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          if(mysqli_num_rows($res) == 1) return true;
          else return false;
        }

        /*  Inserta una nueva tupla a la tabla votaprofesional
        *   Parametros:
        *        $pincho - Atributo a insetar, identificador del pincho.
        *        $jpro - Atributo a insertar, identificador del jurado profesional.
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function insertarJuradoAusente($pincho,$jpro) {
            $db = new BD();
            $sentencia = "INSERT INTO votaprofesional(pincho_idpincho,juradoprofesional_usuarios_login,finalista) VALUES('".$pincho."','".$jpro."',1)";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

    }
?>

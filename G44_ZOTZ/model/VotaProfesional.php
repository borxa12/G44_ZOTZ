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
        *   Return: Devuelve los datos de vota profesional para los finalistas, en caso contrario, FALSE.
        */
        public function recuperarFinalistas() {
            $db = new BD();
            $sentencia = "SELECT `pincho_idpincho`, AVG(`votoprofesional`) AS media FROM `votaprofesional` WHERE `finalista`=1 GROUP BY `pincho_idpincho` ORDER BY 2 DESC";
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

            $sentencia = "INSERT INTO votaprofesional(pincho_idpincho,juradoprofesional_usuarios_login,votoprofesional) VALUES('".$objeto->pincho_idpincho."','".$objeto->juradoprofesional_usuarios_login."',null)";
            $res = mysqli_query($db->connection,$sentencia);
            echo $sentencia;
            $db->desconectar();
            return $res;
        }

        /*  Recupera los finalistas de la BD, es decir, los pinchos con mejor media de las notas del jurado profesional.
        *   Parametros:
        *        $num - Número máximo de finalistas.
        *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
        */
        public function eleccionFinalistas($num) {
            $db = new BD();
            $sentencia1 = "SELECT `pincho_idpincho`, AVG(`votoprofesional`) AS media FROM votaprofesional GROUP BY 1 ORDER BY 2 DESC LIMIT $num";
            $res1 = mysqli_query($db->connection,$sentencia1);
            if(mysqli_num_rows($res1) == 0) return false;
            while($r = mysqli_fetch_assoc($res1)) {
                $sentencia2 = "UPDATE `votaprofesional` SET `finalista`=1 WHERE `pincho_idpincho`='".$r['pincho_idpincho']."'";
                $res2 = mysqli_query($db->connection,$sentencia2);
            }
            $db->desconectar();
            return true;
        }

    }
?>

<?php

    class CodigoPincho {

        // Atributos
        public $pincho_idpincho;
        public $codigopincho;
        public $likes;
        public $establecimiento_usuarios_login;

        /* Lista los codigos de los pinchos, incluyendo identificar y atributos.
        *  Sin parametros.
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function listar() {
            $db = new BD();
            $sentencia = "SELECT * FROM codigopincho";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
            $db->desconectar();
        }

        /* Lista los codigos de pincho filtrados por el identificador del pincho.
        *  Parametros:
        *       $id - Clave foránea de codigopincho (pincho_idpincho), referencia al identificador del pincho.
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function listarID($id) {
            $db = new BD();
            $sentencia = "SELECT * FROM codigopincho WHERE pincho_idpincho='".$id."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else return $res;
            $db->desconectar();
        }

        /* Agrupa los pinchos por pincho_idpincho y suma la columa likes. Los resultados se devuelven en orden descendiente por likes.
        *  Sin Parametros.
        *  Return: Devuelve los datos sin tratar sin tratar o FALSE en caso de error.
        */
        public function listarLikes($num) {
            $db = new BD();
            $sentencia = "SELECT `pincho_idpincho`, SUM(`likes`) FROM `codigopincho` GROUP BY `pincho_idpincho` ORDER BY 2 DESC LIMIT $num";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res) == 0) return false;
            else return $res;
            $db->desconectar();
        }

        /* Lista los codigos de pincho filtrados por codigo.
        *  Parametros:
        *       $cod - Clave primaria de codigopincho (codigopincho).
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function recuperar($cod) {
            $db = new BD();
            $sentencia = "SELECT * FROM codigopincho WHERE codigopincho='".$cod."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
            $db->desconectar();
        }

        /* Elimina una tupla de codigo pincho con el codigo indicado.
        *  Parametros:
        *       $cod - Clave primaria de la tabla (codigopincho).
        *  Return: Devuelve TRUE si la tupla se elimina correctamente o FALSE en caso contrario.
        */
        public function eliminar($cod) {
            $db = new BD();
            $sentencia = "DELETE FROM codigopincho WHERE codigopincho='".$cod."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Modifica una tupla de concurso con el codigo indicado.
        *  Parametros:
        *       $cod - Clave primaria del codigo pincho (codigopincho).
        *       $likes - Atributo a modificar, numero de personas que eligieron el pincho como favorito (likes).
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function modificar($cod,$likes) {
            $db = new BD();
            $sentencia = "UPDATE codigopincho SET likes='".$likes."' WHERE codigopincho='".$cod."' ";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Inerta una tupla de codigo pinhco con los parametros indicado.
        *  Por defecto el campo likes está a null.
        *  Parametros:
        *       $codigopincho - Atributo a insertar, clave primario del codigo pincho (codigopincho).
        *       (integer) $pincho_idpincho - Atributo a insertar, identificar del pincho.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function insertar($codigopincho, $pincho_idpincho) {
            $db = new BD();
            $sentencia = "INSERT INTO codigopincho (codigopincho, pincho_idpincho)
                VALUES('".$codigopincho."','".$pincho_idpincho."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }
    }
?>


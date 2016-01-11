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

        /*  Recupera los favoritos de la BD, es decir, los pinchos más populares según el jurado popular.
        *   Parametros:
        *        $num - Número máximo de favoritos.
        *   Return: Devuelve un conjunto de datos y en caso contrario FALSE.
        */
        public function eleccionFavoritos($num) {
            $db = new BD();
            $sentencia1 = "SELECT `pincho_idpincho`, AVG(`likes`) AS media FROM codigopincho GROUP BY 1 ORDER BY 2 DESC LIMIT $num";
            $res1 = mysqli_query($db->connection,$sentencia1);
            if(mysqli_num_rows($res1) == 0) return false;
            while($r = mysqli_fetch_assoc($res1)) {
                $sentencia2 = "UPDATE `codigopincho` SET `favorito` = 1 WHERE `pincho_idpincho`='".$r['pincho_idpincho']."'";
                $res2 = mysqli_query($db->connection,$sentencia2);
            }
            $db->desconectar();
            return true;
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

        /*  Recupera los identificadores de pincho favoritos.
        *   Sin parametros.
        *   Return: Devuelve los datos de codigo pincho para los favoritos.
        */
        public function recuperarFavoritos() {
            $db = new BD();
            $sentencia = "SELECT `pincho_idpincho`, SUM(`likes`) AS media FROM `codigopincho`  WHERE `favorito` = 1 GROUP BY `pincho_idpincho` ORDER BY 2 DESC";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
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

<?php

    require_once './BD.php';

    class CodigoPincho {

        private $bd;
        // Atributos
        public $pincho_idpincho;
        public $codigopincho;
        public $likes;
        public $establecimiento_usuarios_login;

        /* Constructor de la clase que inicializa la base de datos.
        *  Sin parametros.
        *  Sin return.
        */
        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        /* Lista los codigos de los pinchos, incluyendo identificar y atributos.
        *  Sin parametros.
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function listar() {
            $db = new BD();
           // $res = $db->consulta("SELECT * FROM codigopincho");
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
           // $res = $db->consulta("SELECT * FROM codigopincho");
            $sentencia = "SELECT * FROM codigopincho WHERE pincho_idpincho='".$id."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
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
           // $res = $db->consulta("SELECT * FROM codigopincho WHERE codigopincho=?",'s', $id);
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
            // $res = $db->consulta("DELETE * FROM codigopincho WHERE pincho_idpincho=?",'s', $id);
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
            //$param = array($objeto->pincho_idpincho, $objeto->codigopincho, $objeto->like, $objeto->establecimiento_usuarios_login);
           // $res = $db->consulta("UPDATE codigopincho SET pincho_idpincho=?, codigopincho=?, like=?, establecimiento_usuarios_login=?",'ssis', $param);
            $sentencia = "UPDATE codigopincho SET likes='".$likes."' WHERE codigopincho='".$cod."' ";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Inerta una tupla de codigo pinhco con los parametros indicado.
        *  Parametros:
        *       $codigopincho - Atributo a insertar, clave primario del codigo pincho (codigopincho).
        *       (integer) $likes - Atributo a insertar, numero de personas a las que le gusta el pincho.
        *       $establecimiento_usuarios_login - Atributo a insertar, establecimiento propietario del pincho y que genera los codigos.
        *       (integer) $pincho_idpincho - Atributo a insertar, identificar del pincho.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function insertar($codigopincho,$likes,$establecimiento_usuarios_login,$pincho_idpincho) {
            $db = new BD();
            //$param = array($objeto->pincho_idpincho, $objeto->codigopincho, $objeto->like, $objeto->establecimiento_usuarios_login);
            // $res = $db->consulta("INSERT INTO codigopincho (pincho_idpincho, codigopincho, like, establecimiento_usuarios_login) VALUES(?,?,?,?)",'ssis', $param);
            $sentencia = "INSERT INTO codigopincho (codigopincho, likes, establecimiento_usuarios_login, pincho_idpincho)
                VALUES('".$codigopincho."','".$likes."','".$establecimiento_usuarios_login."','".$pincho_idpincho."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

    }

    //  $codPincho = new CodigoPincho();
    //  $codPincho2 = new CodigoPincho();
    // $codPincho2->pincho_idpincho ='1';
    //     $codPincho2->codigopincho = '1234';
    //     $codPincho2->likes = '1';
    //     $codPincho2->establecimiento_usuarios_login = 'establecimiento1';

    // $codPincho = new CodigoPincho();
    // $res = $codPincho->insertar("AAA001",2,"establecimiento1",1);
    // if(!$res) echo "MAL";
    // else echo "BIEN";

    //  $res = $codPincho->eliminar('1234');
    //  if ($res == false) echo "no modificado";
    //  else{
    //     echo "modificado";
    //     /*while($data = mysqli_fetch_assoc($res)) {
    //      echo $data['pincho_idpincho']."<br/>";
    //      echo $data['codigopincho']."<br/>";
    //      echo $data['like']."<br/>";
    //      echo $data['establecimiento_usuarios_login']."<hr/>";
    //
    // }*/
    // }

?>

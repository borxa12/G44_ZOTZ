<?php

    require_once './BD.php';

    class CodigoPincho {

        private $bd;
        // Atributos
        public $pincho_idpincho;
        public $codigopincho;
        public $likes;
        public $establecimiento_usuarios_login;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listar() {
            $db = new BD();
           // $res = $db->consulta("SELECT * FROM codigopincho");
            $sentencia = "SELECT * FROM codigopincho";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
            $db->desconectar();
        }

        public function listarID($id) {
            $db = new BD();
           // $res = $db->consulta("SELECT * FROM codigopincho");
            $sentencia = "SELECT * FROM codigopincho WHERE pincho_idpincho='".$id."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
            $db->desconectar();
        }

        public function recuperar($cod) {
            $db = new BD();
           // $res = $db->consulta("SELECT * FROM codigopincho WHERE codigopincho=?",'s', $id);
            $sentencia = "SELECT * FROM codigopincho WHERE codigopincho='".$cod."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
            $db->desconectar();
        }

        public function eliminar($cod) {
            $db = new BD();
           // $res = $db->consulta("DELETE * FROM codigopincho WHERE pincho_idpincho=?",'s', $id);
            $sentencia = "DELETE FROM codigopincho WHERE codigopincho='".$cod."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        public function modificar($cod,$likes) {
            $db = new BD();
            //$param = array($objeto->pincho_idpincho, $objeto->codigopincho, $objeto->like, $objeto->establecimiento_usuarios_login);
           // $res = $db->consulta("UPDATE codigopincho SET pincho_idpincho=?, codigopincho=?, like=?, establecimiento_usuarios_login=?",'ssis', $param);
            $sentencia = "UPDATE codigopincho SET likes='".$likes."' WHERE codigopincho='".$cod."' ";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        public function insertar($objeto) {
            $db = new BD();
            //$param = array($objeto->pincho_idpincho, $objeto->codigopincho, $objeto->like, $objeto->establecimiento_usuarios_login);
           // $res = $db->consulta("INSERT INTO codigopincho (pincho_idpincho, codigopincho, like, establecimiento_usuarios_login) VALUES(?,?,?,?)",'ssis', $param);
            $sentencia = "INSERT INTO codigopincho (pincho_idpincho, codigopincho, likes, establecimiento_usuarios_login) VALUES('".$objeto->pincho_idpincho."','".$objeto->codigopincho."','".$objeto->like."','".$objeto->establecimiento_usuarios_login."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

    }

     $codPincho = new CodigoPincho();
     $codPincho2 = new CodigoPincho();
    $codPincho2->pincho_idpincho ='1';
        $codPincho2->codigopincho = '1234';
        $codPincho2->likes = '1';
        $codPincho2->establecimiento_usuarios_login = 'establecimiento1';

     $res = $codPincho->eliminar('1234');
     if ($res == false) echo "no modificado";
     else{
        echo "modificado";
        /*while($data = mysqli_fetch_assoc($res)) {
         echo $data['pincho_idpincho']."<br/>";
         echo $data['codigopincho']."<br/>";
         echo $data['like']."<br/>";
         echo $data['establecimiento_usuarios_login']."<hr/>";
        
    }*/
}
?>

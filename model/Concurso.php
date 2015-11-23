<?php

    //require_once './BD.php';

    class Concurso {

      //private $bd;
        // Atributos
        public $edicion;
        public $folleto;
        public $gastromapa;
        public $fechac;
        public $fechaf;
        public $usuarios_login;

        // public function __construct() {
        //     try {
        //         $this->bd = new BD();
        //     } catch (Exception $e) {
        //         die($e->getMessage());
        //     }
        // }

        /* Constructor de la clase que inicializa la base de datos.
        *  Sin parametros.
        *  Sin return.
        */
        /*public function __construct() { // $edicion,$folleto,$gastromapa,$fechac,$fechaf,$usuarios_login
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
            // $this->edicion = $edicion;
            // $this->folleto = $folleto;
            // $this->gastromapa = $gastromapa;
            // $this->fechac = $fechac;
            // $this->fechaf = $fechaf;
            // $this->usuarios_login = $usuarios_login;
        }
*/
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

        /* Inerta una tupla de concurso con los parametros indicado.
        *  Parametros:
        *       $edicion - Atributo a insertar, clave primario del concurso (edicion).
        *       $folleto - Atributo a insertar, folleto de concurso.
        *       $gastromapa - Atributo a insertar, gastromapa de concurso.
        *       $fechac - Atributo a insertar, fecha de incio de concurso.
        *       $fechaf - Atributo a insertar, fecha de finalización de concurso.
        *       $usuarios_login - Atributo a insertar, usuario de tipo organizador que gestiona concurso.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function insertar($edicion,$folleto,$gastromapa,$fechac,$fechaf,$usuarios_login) {
            $db = new BD();
            //$param = array($objeto->pincho_idpincho, $objeto->codigopincho, $objeto->like, $objeto->establecimiento_usuarios_login);
           // $res = $db->consulta("INSERT INTO codigopincho (pincho_idpincho, codigopincho, like, establecimiento_usuarios_login) VALUES(?,?,?,?)",'ssis', $param);
            $sentencia = "INSERT INTO concurso (edicion, folleto, gastromapa, fechac, fechaf, usuarios_login)
                VALUES('".$edicion."','".$folleto."','".$gastromapa."','".$fechac."','".$fechaf."','".$usuarios_login."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }
    }

    // $codPincho = new Concurso();
    // $res = $codPincho->eliminar(4);
    // $res = $codPincho->modificar("4","4",'./folletos/2015/folleto.png', './gastromapas/2015/gastromapa.png', '2015-12-11', '2015-12-22', 'organizador');
    // $res = $codPincho->insertar("15",'./folletos/2015/folleto.png', './gastromapas/2015/gastromapa.png', '2015-12-11', '2015-12-22', 'organizador');
    // if(!$res) echo "MAL";
    // else echo "BIEN";

    // if(!$res) {
    //     echo "LA HAS CAGADO";
    // } else {
    //     while($data = mysqli_fetch_assoc($res)) {
    //         echo $data['edicion']."<br/>";
    //         echo $data['folleto']."<br/>";
    //         echo $data['gastromapa']."<br/>";
    //         echo $data['fechac']."<br/>";
    //         echo $data['fechaf']."<br/>";
    //         echo $data['usuarios_login']."<hr/>";
    //     }
    // }

?>

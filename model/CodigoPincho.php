<?php

    require_once './BD.php';

    class CodigoPincho {

        private $bd;
        // Atributos
        public $pincho_idpincho;
        public $codigopincho;
        public $like;
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
            $res = $db->consulta("SELECT * FROM codigopincho");
            $db->desconectar();
            return $res;
        }

        public function recuperar($id) {

        }

        public function eliminar($id) {

        }

        public function modificar($objeto) {

        }

        public function insertar($objeto) {

        }

    }

    // $codPincho = new CodigoPincho();
    // $res = $codPincho->listar();
    // while($data = mysqli_fetch_assoc($res)) {
    //     echo $data['pincho_idpincho']."<br/>";
    //     echo $data['codigopincho']."<br/>";
    //     echo $data['like']."<br/>";
    //     echo $data['establecimiento_usuarios_login']."<hr/>";
    // }

?>

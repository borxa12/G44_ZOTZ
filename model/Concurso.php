<?php

    require_once './BD.php';

    class Concurso {

        private $bd;
        // Atributos
        public $edicion;
        public $folleto;
        public $gastromapa;
        public $fechac;
        public $fechaf;
        public $usuarios_login;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listar() {
            $db = new BD();
            $res = $db->consulta("SELECT * FROM concurso");
            $db->desconectar();
            return $res;
        }

        public function recuperar($id) {

        }

        public function eliminar($id) {

        }

        public function modificar() {

        }

        public function insertar() {

        }
    }

    // $codPincho = new Concurso();
    // $res = $codPincho->listar();
    // while($data = mysqli_fetch_assoc($res)) {
    //     echo $data['edicion']."<br/>";
    //     echo $data['folleto']."<br/>";
    //     echo $data['gastromapa']."<br/>";
    //     echo $data['fechac']."<br/>";
    //     echo $data['fechaf']."<br/>";
    //     echo $data['usuarios_login']."<hr/>";
    // }

?>

<?php

    require_once './BD.php';

    class VotaProfesional {

        private $bd;
        // Atributos
        public $pincho_idpincho;
        public $juradoprofesional_usuarios_login;
        public $votoprofesional;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
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

    // $codPincho = new JuradoProfesional();
    // $res = $codPincho->listar();
    // while($data = mysqli_fetch_assoc($res)) {
    //     echo $data['usuarios_login']."<br/>";
    //     echo $data['nombre']."<br/>";
    //     echo $data['direccion']."<br/>";
    //     echo $data['telefono']."<br/>";
    //     echo $data['web']."<br/>";
    //     echo $data['horario']."<br/>";
    //     echo $data['descripcionestablecimiento']."<hr/>";
    // }

?>

<?php

    require_once './BD.php';

    class Establecimiento {

        private $bd;
        // Atributos
        private $usuarios_login;
        private $nombre;
        private $direccion;
        private $telefono;
        private $web;
        private $horario;
        private $descripcionestablecimiento;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listar() {
            $db = new BD();
            $res = $db->consulta("SELECT * FROM establecimiento");
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

    // $codPincho = new Establecimiento();
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

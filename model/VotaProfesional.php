<?php

    require_once './BD.php';

    class VotaProfesional {

        private $bd;
        // Atributos
        public $pincho_idpincho;
        public $juradoprofesional_usuarios_login;
        public $votoprofesional=null;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function recuperar($id) {
          $db = new BD();
          $sentencia = "SELECT * FROM votaprofesional WHERE pincho_idpincho='".$id."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }

        public function eliminar($id) {
          $db = new BD();
          $sentencia = "DELETE FROM votaprofesional WHERE pincho_idpincho='".$id."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }

        public function modificar($objeto) {
          $db = new BD();
          $sentencia = "UPDATE votaprofesional SET pincho_idpincho='".$objeto->pincho_idpincho."',juradoprofesional_usuarios_login'".$objeto->juradoprofesional_usuarios_login."',votoprofesional='".$objeto->votoprofesional."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
        /*  Inserta una nueva tupla a la tabla votaprofesional
        *   Parametros:
                $$objeto - Array con los atributos de la nueva asignacion de pincho a jurado profesional a insertar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function insertar($idpincho,$jurado) {
          $db = new BD();
          foreach ($jurado as $jp) {
            $sentencia = "INSERT INTO votaprofesional(pincho_idpincho,juradoprofesional_usuarios_login,votaprofesional) VALUES('".$idpincho."','".$jp."',NULL)";
            $res = mysqli_query($db->connection,$sentencia);
            if(!$res){
              $db->desconectar();
              return $res;
            }
          }
          $db->desconectar();
          return $res;
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

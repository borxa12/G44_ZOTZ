<?php

    // require_once './BD.php';

    class VotaProfesional {

        // private $bd;
        // Atributos
        public $pincho_idpincho;
        public $juradoprofesional_usuarios_login;
        public $votoprofesional=null;

        // public function __construct() {
        //     try {
        //         $this->bd = new BD();
        //     } catch (Exception $e) {
        //         die($e->getMessage());
        //     }
        // }
        /*  lista las asignaciones de pincho a jurado profesional
        *   Return: Devuelve la lista con los datos.
        */
        public function listar() {
          $db = new BD();
          $sentencia = "SELECT * FROM votaprofesional";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
        /*  recupera los datos de la asignacione de pincho a jurado profesional
        *   Parametros:
                $id - id del pincho de la asignacion a recuperar.
        *   Return: Devuelve los datos de la asignacion.
        */
        public function recuperar($id) {
          $db = new BD();
          $sentencia = "SELECT * FROM votaprofesional WHERE pincho_idpincho='".$id."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
        /*  ELimina una tupla de la tabla votaprofesional
        *   Parametros:
                $id - id del pincho de la asignacion a eliminar.
                $login - login del jurado de la asignacion a eliminar
        *   Return: Devuelve TRUE si se han podido eliminar los datos.
        */

        public function eliminar($id,$login) {
          $db = new BD();
          $sentencia = "DELETE FROM votaprofesional WHERE pincho_idpincho='".$id."' AND juradoprofesional_usuarios_login='".$login."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
        /*  MOdifica una tupla en la tabla votaprofesional
        *   Parametros:
                $objeto - Array con los atributos a modificar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */

        public function modificar($objeto) {
          $db = new BD();
          $sentencia = "UPDATE votaprofesional SET pincho_idpincho='".$objeto->pincho_idpincho."',juradoprofesional_usuarios_login'".$objeto->juradoprofesional_usuarios_login."',votoprofesional='".$objeto->votoprofesional."'";
          $res = mysqli_query($db->connection,$sentencia);
          $db->desconectar();
          return $res;
        }
        /*  Inserta una nueva tupla a la tabla votaprofesional
        *   Parametros:
                $objeto - Array con los atributos de la nueva asignacion de pincho a jurado profesional a insertar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function insertar($objeto) {
          $db = new BD();
          $sentencia = "INSERT INTO votaprofesional(pincho_idpincho,juradoprofesional_usuarios_login,votaprofesional) VALUES('".$objeto->pincho_idpincho."','".$objeto->juradoprofesional_usuarios_login."','".$objeto->votoprofesional."')";
          $res = mysqli_query($db->connection,$sentencia);
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


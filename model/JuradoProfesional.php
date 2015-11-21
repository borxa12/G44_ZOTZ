<?php

    require_once './BD.php';

    class JuradoProfesional {

        private $bd;
        // Atributos
        public $usuarios_login;
        public $password;
        public $email;
        public $fotojuradoprofesional;
        public $nombrejuradoprofesional;
        public $reconocimientos;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

    		/*  Lista el JuradoProfesional inscrito en el concurso.
    		*   Return: Devuelve una lista con los atributos de todos los miembros del JuradoProfesional.
    		*/
        public function listar() {
            $db = new BD();
            $res = $db->consulta("SELECT * FROM juradoprofesional");
            $db->desconectar();
            return $res;
        }
        /*  Obtiene los datos de un miembro del JuradoProfesional.
        *   Parametros:
                $id - Atributo a comprobar, contiene el login del usuario JuradoProfesional a listar.
        *   Return: Devuelve los datos del usuario JuradoProfesional si ha sido posible encontrarlos.
        */
        public function recuperar($id) {
            $db = new BD();
            $res = $db->consulta("SELECT * FROM juradoprofesional WHERE usuarios_login='".$id."'");
            $db->desconectar();
            return $res;
        }

        /*  Elimina un usuario JuradoProfesional.
        *   Parametros:
        *       $login - Atributo a comprobar, login del usuario que se quiere eliminar.
        *   Return: Devuelve TRUE si se ha podido eliminar el usuario JuradoProfesional.
        */
        public function eliminar($id) {
            $db = new BD();
            $res = $db->consulta("DELETE FROM juradoprofesional WHERE usuarios_login='".$id."'");
            $db->desconectar();
            return $res;
        }
        /*  Permite a un usuario JuradoProfesional modificar sus datos
        *   Parametros:
                $id - Atributo a comprobar, contiene el login del usuario JuradoProfesional a modificar.
        *       $jp - Objeto con los nuevos datos del usuario JuradoProfesional
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function modificar($id,$objeto) {
            $db = new BD();
            $res1 = $db->consulta("UPDATE usuarios SET password='".$objeto->password."',email='".$objeto->email"' WHERE usuarios_login='".$id."'");
            $res2 = $db->consulta("UPDATE juradoprofesional SET fotojuradoprofesional='".$objeto->fotojuradoprofesional."',nombrejuradoprofesional='".$objeto->nombrejuradoprofesional."',reconocimientos='".$objeto->reconocimientos."' WHERE usuarios_login='".$id."'");
            $db->desconectar();
            return ($res1 && $res2);
        }
        /*  Permite a un usuario Organizador crear un nuevo usuario JuradoProfesional
        *   Parametros:
                $$objeto - Array con los atributos el nuevo usuario JuradoProfesional a insertar
        *   Return: Devuelve TRUE si se han podido modificar los datos.
        */
        public function insertar($objeto) {
          $db = new BD();
          $res1 = $db->consulta("INSERT INTO usuarios(login,password,email) VALUES('".$objeto->usuarios_login."','".$objeto->password."','".$objeto->email."')");
          $res2 = $db->consulta("INSERT INTO juradoprofesional(fotojuradoprofesional,nombrejuradoprofesional,reconocimientos) VALUES('".$objeto->fotojuradoprofesional."','".$objeto->nombrejuradoprofesional."','".$objeto->reconocimientos."')");
          $db->desconectar();
          return ($res1 && $res2);
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

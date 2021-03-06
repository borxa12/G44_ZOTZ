<?php

    class Establecimiento {

        // Atributos
        private $usuarios_login;
        private $nombre;
        private $direccion;
        private $telefono;
        private $web;
        private $horario;
        private $descripcionestablecimiento;

        /* Lista los establecimientos, incluyendo identificador y atributos.
        *  Sin parametros.
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function listar() {
            $db = new BD();
            $sentencia = "SELECT * FROM establecimiento";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
            $db->desconectar();
        }

        /*  Recupera una tupla de establecimiento con el login indicado.
        *  Parametros:
        *       $login - Clave primaria de establecimiento (usuarios_login).
        *  Return: Devuelve los datos del concurso sin tratar o FALSE en caso de error.
        */
        public function recuperar($login) {
            $db = new BD();
            $sentencia = "SELECT * FROM establecimiento WHERE usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res) == 0) return false;
            else return $res;
            $db->desconectar();
        }

        /* Elimina una tupla de establecimiento con el login indicado.
        *  Parametros:
        *       $login - Clave primaria de la tabla (usuarios_login).
        *  Return: Devuelve TRUE si la tupla se elimina correctamente o FALSE en caso contrario.
        */
        public function eliminar($login) {
            $db = new BD();
            $sentencia = "DELETE FROM establecimiento WHERE usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Modifica una tupla de establecimiento con el login indicado.
        *  Parametros:
        *       $usurios_login - Atributo a modificar, clave primaria del establecimiento (usuarios_login).
        *       $nombre - Atributo a modificar, nombre del establecimiento.
        *       $direccion - Atributo a modificar, direccion del establecimiento.
        *       $telefono - Atributo a modificar, telefono del establecimiento.
        *       $web - Atributo a modificar, web del establecimiento.
        *       $horario - Atributo a modificar, horario del establecimiento.
        *       $descripcionestablecimiento - Atributo a modificar, descripcción del establecimiento.
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function modificar($login, $nombre, $direccion, $telefono, $web, $horario, $descripcionestablecimiento) {
            $db = new BD();
            $sentencia = "UPDATE establecimiento SET nombre='".$nombre."', direccion='".$direccion."', telefono='".$telefono."', web='".$web."', horario='".$horario."', descripcionestablecimiento='".$descripcionestablecimiento."' WHERE usuarios_login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Inerta una tupla de pincho con los parametros indicado.
        *  Parametros:
        *       $usurios_login - Atributo a insertar, clave primaria del establecimiento (usuarios_login).
        *       $nombre - Atributo a insertar, nombre del establecimiento.
        *       $direccion - Atributo a insertar, direccion del establecimiento.
        *       $telefono - Atributo a insertar, telefono del establecimiento.
        *       $web - Atributo a insertar, web del establecimiento.
        *       $horario - Atributo a insertar, horario del establecimiento.
        *       $descripcionestablecimiento - Atributo a insertar, descripcción del establecimiento.
       *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function insertar($login, $nombre, $direccion, $telefono, $web, $horario, $descripcionestablecimiento) {
            $db = new BD();
            $sentencia = "INSERT INTO `G44_ZOTZ`.`establecimiento` (`usuarios_login`, `nombre`, `direccion`, `telefono`, `web`, `horario`, `descripcionestablecimiento`)
                VALUES ('".$login."', '".$nombre."', '".$direccion."', '".$telefono."', '".$web."', '".$horario."', '".$descripcionestablecimiento."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }
    }
?>

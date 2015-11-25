<?php
    class Usuarios {

        public $login;
        public $password;
        public $email;
        public $tipo;
        
        /* Realiza la comprobación de login del usuario.
        *  Parametros:
        *       $login - Clave primaria de usuarios (login).
        *       $password - Contraseña asociada al usuario (password).
        *  Return: Devuelve los datos del usuario sin tratas o FALSE en caso de error.
        */
        public function login($login,$password) {
            $db = new BD();
            $sentencia = "SELECT * FROM usuarios WHERE login='".$login."' AND password='".$password."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else return $res;
            $db->desconectar();
        }

        /* Lista los usuarios filtrados por login.
        *  Parametros:
        *       $login - Clave primaria de usuarios (login).
        *  Return: Devuelve los datos del usuario sin tratar o FALSE en caso de error.
        */
        public function recuperar($login) {
            $db = new BD();
            $sentencia = "SELECT * FROM usuarios WHERE login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res) == 0) return false;
            else return $res;
            $db->desconectar();
        }

        /* Elimina una tupla de usuarios con el login indicado.
        *  Parametros:
        *       $login - Clave primaria de la tabla (login).
        *  Return: Devuelve TRUE si la tupla se elimina correctamente o FALSE en caso contrario.
        */
        public function eliminar($login) {
            $db = new BD();
            $sentencia = "DELETE FROM usuarios WHERE login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Modifica una tupla de usuarios con el login indicado.
        *  Parametros:
        *       $login - Clave primaria del usuario (login).
        *       $password - Atributo a modificar, contraseña del usuario especificado.
        *       $email - Atributo a modificar, email del usuario especificado.
        *   Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function modificar($login, $password, $email) {
            $db = new BD();
            $sentencia = "UPDATE usuarios SET password='".$password."', email='".$email."' WHERE login='".$login."' ";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        /* Inerta una tupla de usuario con los parametros indicado.
        *  Parametros:
        *       $login - Atributo a insertar, clave primario del usuario (login).
        *       $password - Atributo a insertar, constraseña del usuario.
        *       $email - Atributo a insertar, email del usuario.
        *       $tipo - Atributo a insertar, tipo de usuario (jpop, jpro, org, est).
        *  Return: Devuelve TRUE si la tupla se modifica correctamente o FALSE en caso contrario.
        */
        public function insertar($login, $password, $email, $tipo) {
            $db = new BD();
            $sentencia = "INSERT INTO usuarios (login, password, email, tipo) VALUES('".$login."','".$password."','".$email."','".$tipo."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }
    }

?>

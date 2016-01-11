<?php

    class Comentarios {

        // Atributos
        public $pincho_idpincho;
        public $usuarios_login;
        public $fecha;
        public $comentario;

        /*  Obtiene los comentarios para un pincho por su id.
      	*   Parametros:
      	*       $idpincho - Atributo a comprobar, id del pincho del que se quiere recuperar sus comentarios.
      	*   Return: Devuelve un array con los comentarios del pincho si tiene alguno.
      	*/
        public function listarPorPincho($pincho) {
            $db = new BD();
            $sentencia = "SELECT usuarios_login,DATE_FORMAT(fecha,'%d-%m-%Y %H:%i') as fecha,comentario FROM comentarios WHERE pincho_idpincho='".$pincho."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            if(mysqli_num_rows($res)==0) return false;
             else  return $res;
        }

        /*  Inserta un nuevo comentario en la base de datos
      	*   Parametros:
      	*       $idpincho - Atributo a insertar, id del pincho del del que se quiere insertar el nuevo comentario.
      	*       $login - Atributo a insertar, login del usuario que ha hecho el comentario.
      	*       $comentario - Atributo a insertar, comentario realizado por el usuario.
      	*   Return: Devuelve true si el comentario se ha insertado correctamente.
      	*/
        public function insertarComentario($idpincho,$login,$coment){
            $db = new BD();
            $sentencia = "INSERT INTO comentarios(pincho_idpincho,usuarios_login,fecha,comentario) VALUES('".$idpincho."','".$login."',NOW(),'".$coment."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

    }
?>

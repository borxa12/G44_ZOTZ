<?php

    // require_once 'BD.php';
    // require_once 'http://localhost/Zotz/modelBD.php';
    // include("../loader.php");
    // loadclasses("model","BD.php");
    // loadclasses("menus","menuestablecimiento.html");

    class Usuarios {

        // private $bd;
        // Atributos
        public $login;
        public $password;
        public $email;
        public $tipo;


        /* Constructor de la clase que inicializa la base de datos.
        *  Sin parametros.
        *  Sin return.
        */
        // public function __construct() {
        //     try {
        //         $this->bd = new BD();
        //     } catch (Exception $e) {
        //         die($e->getMessage());
        //     }
        // }

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
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
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

    // $user = new Usuarios();
    // $user2 = new Usuarios();
    // $user2->login ='lucia';
    // $user2->password='abc';
    // $user2->email = 'lucia@email.com';
    // $user2->tipo = 'jpop';

    // $res = $user->login('establecimiento1','estpass');
    //  if (!$res) echo "Mal";
    //  else {
    //     echo "Bien";
    //     while($data = mysqli_fetch_assoc($res)) {
    //         echo $data['login']."<br/>";
    //         echo $data['password']."<br/>";
    //         echo $data['email']."<br/>";
    //         echo $data['tipo']."<hr/>";
    //     }
    // }

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



<!-- class Usuario{
    private $login;
    private $password;
    private $email;
    private $tipo;


    public function __construct($login,$password,$email,$tipo) {
        $this->login=$login;
        $this->password=$password;
        $this->email=$email;
        $this->tipo=$tipo;
    }

    public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login=$login;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password=$password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email=$email;
    }

    public function getTipo(){
        return $this->tipo;
    }

    public function setTipo($tipo){
        $this->tipo=$tipo;
    }
    //Funcion que lista los usuarios según el tipo.
    public static function listar($tipo){
        $sentencia = "SELECT * FROM usuario WHERE tipo='".$tipo."'";
        $consulta=Bd::consultar($sentencia);

    }
    //Funcion que inserta un usuario
    public static function insertar($usuario){
        $sentencia="insert into usuario values('".$usuario->getLogin()."','".$usuario->getPassword()."','".$usuario->getEmail()."','".$usuario->getTipo()."');";
        return Bd::consultar($sentencia);
    }

    //Modificar un usuario
    public static function modificar($usuario,$login,$password,$email,$tipo){
        $sentencia="update usuario set login='".$login."', password='".$password."', email='".$email."', tipo='".$tipo."' where login='".$usuario->getLogin()."';";
        if(Bd::consultar($sentencia)) {
            $usuario->setLogin($login);
            $usuario->setPassword($password);
            $usuario->setEmail($email);
            $usuario->setTipo($tipo);
            return true;
        }
        else return false;
    } -->

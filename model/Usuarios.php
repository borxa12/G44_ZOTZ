<?php

    require_once './BD.php';

    class Usuarios {

        private $bd;
        // Atributos
        public $login;
        public $password;
        public $email;
        public $tipo;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function recuperar($login) {
            $db = new BD();
            $sentencia = "SELECT * FROM usuarios WHERE login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            if(mysqli_num_rows($res)==0) return false;
            else  return $res;
            $db->desconectar();
        }

        public function eliminar($login) {
            $db = new BD();
            $sentencia = "DELETE FROM usuarios WHERE login='".$login."'";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        public function modificar($objeto) {
            $db = new BD();
            $sentencia = "UPDATE usuarios SET password='".$objeto->password."', email='".$objeto->email."' WHERE login='".$objeto->login."' ";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }

        public function insertar($objeto) {
             $db = new BD();
            $sentencia = "INSERT INTO usuarios (login, password, email, tipo) VALUES('".$objeto->login."','".$objeto->password."','".$objeto->email."','".$objeto->tipo."')";
            $res = mysqli_query($db->connection,$sentencia);
            $db->desconectar();
            return $res;
        }
    }

    $user = new Usuarios();
    $user2 = new Usuarios();
    $user2->login ='lucia';
    $user2->password='abc';
    $user2->email = 'lucia@email.com';
    $user2->tipo = 'jpop';

    $res = $user->eliminar('lucia');
     if ($res == false) echo "Mal";
     else{
        echo "Bien";
        /*while($data = mysqli_fetch_assoc($res)) {
         echo $data['login']."<br/>";
         echo $data['password']."<br/>";
         echo $data['email']."<br/>";
         echo $data['tipo']."<hr/>";
        }*/
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

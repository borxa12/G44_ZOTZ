<?php
    include("../model/BD.php");

    class Sesion {

        var $login;
        var $tipo;
        private $logged;

        public function __construct() {
            session_start();
            if (isset($_SESSION['logged'])&&($_SESSION['logged'])) {
                $this->login=$_SESSION['login'];
                $this->tipo=$_SESSION['tipo'];
                $this->logged=true;
            }
        }

        public function login($login,$password) {
            $query = "SELECT * FROM usuarios WHERE login=? AND password=?";
            $db = new BD();
            $stmt = $db->connection->prepare($query);
			$stmt->bind_param('ss',$login,$password);
			$stmt->execute();
			$resultado = $stmt->get_result();
            if($resultado->num_rows == 1) {
                if($res = mysqli_fetch_assoc($resultado)) {
                    $this->login = $res['login'];
                    $this->tipo = $res['tipo'];
                    $this->logged = true;
                    $_SESSION['login'] = $this->login;
                    $_SESSION['tipo'] = $this->tipo;
                    $_SESSION['logged'] = $this->logged;
                }
            }
            $db->desconectar();
            return $this->logged;
        }

        public function logout(){
            session_unset();
            session_destroy();
        }

        public function isLogged(){
            return $this->logged;
        }

    }

    // $session = new Sesion();
    // $session->login("borxa","borxa");

?>

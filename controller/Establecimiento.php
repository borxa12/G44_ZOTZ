<?php
	class Usuario{
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
		}



	}

<?php

	class BD {

		public $connection;

		/* Constructor de la clase.
		*  Los parametros estás predefinidos.
		*/
		public function __construct($host="127.0.0.1",$user="zotz",$pass="zotz",$db="g44_zotz") {;
			$this->connection = new mysqli($host,$user,$pass,$db);
			return $this->connection;
		}

		/* Método para la realización de consultas SQL parametrizadas.
		*  String $query - String con la sentencia SQL PreparedStatement
		*  String $type - Cadena con los tipos de cada parametro (s = string, i = integer, d = double, b = blob)
		*  String[] $param - Array de Strings con los parametros necesarios
		*  Ejemplo de llamada a la función:
		*		$var = new BD();
		*		$var->consultar("SELECT * FROM usuarios WHERE login=? AND password=?",'ss',array("manolo","o_pata_chula"));
		*  Return: Devuelve un conjunto de resultados o FALSE en caso de error.
		*/
		public function consultar($query,$type,$param) {
			//return mysqli_query($this->connection,$sentencia);
			//$query = "SELECT * FROM usuarios";
			$stmt = $this->connection->prepare($query);
			$parameters = array();
			$parameters[] = &$type;
			for ($i=0; $i < count($param); $i++) {
				$parameters[] = &$param[$i];
			}
			call_user_func_array(array($stmt,'bind_param'),$parameters);
			$stmt->execute();
			$resultado = $stmt->get_result();
			//$data = mysqli_fetch_assoc($resultado);
			return $resultado;
		}

		/* Realiza consultas SQL sin parametrizar.
		*  String $query - String con la sentencia SQL.
		*  Return: Devuelve un conjunto der resultados o FALSE en caso de error.
		*/
		public function consulta($query) {
			$stmt = $this->connection->prepare($query);
			$stmt->execute();
			return $stmt->get_result();
		}

		/* Desconecta la Base de Datos. */
		public function desconectar(){
			$this->connection->close();
		}

	}

	// $var = new BD();
	// // $var->consultar("INSERT INTO usuarios VALUES (?,?,?,?)",'ssss',array("borxa","borxa","borxa","org"));
	// $var->consultar("SELECT * FROM codigopincho",'',array());
	// while($data = mysqli_fetch_assoc($var)) {
	// 	echo $data['idpincho'];
	// }
?>

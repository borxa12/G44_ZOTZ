<?php
    include 'BD.php';

    class Pincho {
        public $idpincho;
        public $nombrepincho;
        public $fotopincho;
        public $decripcionpincho;
        public $ingredientesp;
        public $precio;
        public $aceptado;
        public $concurso_edicion;
        public $establecimiento_usuarios_login;

        public function __construct() {
            try {
                $this->bd = new BD();
            } catch (Exception $e) {
                die($e->getMessage());
            }
        }

        public function listar() {
            $db = new BD();
            $res = $db->consulta("SELECT * FROM pincho");
            $db->desconectar();
            return $res;
        }

        public function recuperar($id) {

        }

        public function eliminar($id) {

        }

        public function modificar($objeto) {

        }

        public function insertar($objeto) {

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

        <!-- /* Inserta un Pincho en la BD. Comprueba que los campos necesarios no son null o estan vacios
        *  y ademas comprueba que el pincho que se intenta insertar no exista en la BD.
        *  Pincho $objeto - Objeto Pincho a insertar en la BD.
        *  Return: Devuelve TRUE si la insercion se realiza correctamente y FALSE en caso contrario.
        */
        public static function insertar($objeto) {
            if( ($objeto->nombre_pincho==null || $objeto->foto_pincho==null || $objeto->descripcion_pincho=null
                || $objeto->ingredientes_pincho==null || $objeto->precio==null || $objeto->concurso_edicion==null
                || $objeto->establecimiento_usuario_login==null
                || $objeto->nombre_pincho=="" || $objeto->foto_pincho=="" || $objeto->descripcion_pincho=""
                || $objeto->ingredientes_pincho=="" || $objeto->precio=="" || $objeto->concurso_edicion==""
                || $objeto->establecimiento_usuario_login=="" )
                || Pincho::existe($objeto) ) {
                    //echo "Todo mal"."<hr/>";
                return false;
            } else {
                $db = new BD();
                $res = $db->consultar("INSERT INTO pincho (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`,
                    `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`)
                    VALUES(?,?,?,?,?,?,?,?,?)",'issssdiis',array($objeto->id_pincho,$objeto->nombre_pincho,$objeto->foto_pincho,
                    $objeto->descripcion_pincho,$objeto->ingredientes_pincho,$objeto->precio,$objeto->aceptado,$objeto->concurso_edicion,
                    $objeto->establecimiento_usuario_login));
                    //INSERT INTO `g44_zotz`.`pincho` (`idpincho`, `nombrepincho`, `fotopincho`, `descripcionpincho`, `ingredientesp`, `precio`, `aceptado`, `concurso_edicion`, `establecimiento_usuarios_login`) VALUES (NULL, 'sdf', 'asdf', 'adf', 'asdf', 'asdf', NULL, '0', 'cris');
                $db->desconectar();
                //echo "Todo ben"."<hr/>";
                return $res;
            }
        }

        /* Elimina el objeto pasado por parámetro de la BD. La comprobación la realiza por el id del pincho.
        *  Pincho $objeto - Objeto Pincho a eliminar.
        *  Return: Devulve TRUE si el borrado se ha realizado y FALSE en caso contrario.
        */
        public static function eliminar($objeto) {
            $db = new BD();
            $res = Pincho::existe($objeto);
            if($res) {
                echo "1";
            } else echo "2";
            echo "COSAS";
            if(!$res) {
                echo "FALSE";
                return false;
            } else {
                $db->consultar("DELETE FROM `pincho` WHERE `idpincho`=?",'i',array($objeto->id_pincho));
                echo "TRUE";
                return true;
            }
        }

        /* Comprueba que un Pincho existe en la BD comprobando si 'conscurso_edicion' y 'establecimiento_usuarios_login' ya tienen
        *  un Pincho introducido.
        *  Pincho $objeto - Objeto Pincho a comprobar si existe en la BD.
        *  Return: Devulve una lista de 'idpincho' o FALSE en caso contrario.
        */
        public static function existe($objeto) {
            $db = new BD();
            $res = $db->consultar("SELECT `idpincho` FROM `pincho` WHERE `concurso_edicion`=? AND `establecimiento_usuarios_login`=?",
                'ss',array($objeto->concurso_edicion,$objeto->establecimiento_usuario_login));
            $num_rows = $res->num_rows;
            //echo "$num_rows";
            switch ($num_rows) {
                case '0':
                    return false;
                    break;
                case '1':
                    while($data = mysqli_fetch_assoc($res))
                        return $data['idpincho'];
                    break;
                default:
                    return false;
                    break;
            }
            $db->desconectar();
        }

    }


    $pincho = new Pincho(null,"pincho1","./fotos/pincho1.png","mu rico","popo",2.34,null,"0","user1");
    // $res = Pincho::insertar($pincho);
    Pincho::existe($pincho);
    //Pincho::eliminar($pincho);

?> -->

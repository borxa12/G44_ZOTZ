<?php

	//require_once '../model/Establecimiento.php';
	require_once '../model/CodigoPincho.php';
	//require_once '../model/Establecimiento.php';
	//require_once '../model/JuradoProfesional.php';
	require_once '../model/Pincho.php';
	//require_once '../model/Usuarios.php';
	//require_once '../model/VotaProfesional.php';
    require_once '../model/BD.php';

    /* Funcion que actualiza el campo likes con el valor de $likes de la tupla de codigopincho
    * que indica el parámetro $cod.
    * El parámetro $likes no puede ser null, si lo es devuelve false.
    * Se llama a validarCodigo($cod) para comprobar que el codiopincho es valido en caso de no serlo devuelve false
    */
	function votarPincho($cod,$likes) {
        $codigopincho = new CodigoPincho();
        if($likes != null){
            if(validarCodigo($cod) == true){
                $res = $codigopincho->modificar($cod, $like);
                return $res;
            } else return false;
        } else return false;
	}

    /* Funcion que dado un $cod (codigopincho) comprueba que sea valido.
    *  LLama a la funcion validarPincho($ccod) si el resultado de esta es true llama a recuperarPincho($cod)
    *  si es false devuelve false.
    */
    function introducirCodigos($cod) {
        $codigopincho = new CodigoPincho();
        if(validarCodigo($cod) == true){
            return recuperarPincho($cod);
        }
        else{
            return false;
        }

    }

   /* function seleccionarPincho($cod) {

    }*/

    /* Funcion que recupera la informción del pincho al que esta asociado $cod (codigopincho).
    */
    function recuperarPincho($cod) {
        $pincho = new Pincho();
        $codPincho = new CodigoPincho();
        $res = $codPincho->recuperar($cod);
        $data = mysqli_fetch_assoc($res);
        $id = $data['pincho_idpincho'];
        return $pincho->recuperar($id);
    }

    /* Funcion que comprueba que el $cod (codigopincho) que se le pasa por parámetro existe
    *  y el campo likes de la tupla esta a null.
    */
    function validarCodigo($cod) {
        $codPincho = new CodigoPincho();
        $res = $codPincho->recuperar($cod);
        if($res == false){
            return false;
        }else {
            $data = mysqli_fetch_assoc($res);
            if($data['likes'] == null) return $res;
            else return false;
        }
    }

    /*function actualizarVotacion() {

    }*/


    // $res = introducirCodigos('4423AS');
    // if($res) echo "valido"."<br/>";
    // else echo "no valido";
    /*while($data = mysqli_fetch_assoc($res)) {
        echo $data['idpincho']."<br/>";
        echo $data['nombrepincho']."<hr/>";
    }*/
?>

<?php
    include_once("../../loader.php");
    loadclasses("model","Pincho.php");
    loadclasses("model","CodigoPincho.php");
    loadclasses("model","BD.php");

    /*	Actualiza el campo likes con el valor de $likes de la tupla de codigopincho que indica el parámetro $cod.
    *	Parámetros:
    *		cod: es el código del pincho que se quiere votar.
    *		$likes: valor con el que se quiere votar(0 o 1).
    * 	Return: devuelve TRUE si se actualizaron los datos, FALSE en caso contrario. 
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

    /* 	Funcion que comprueba si $cod (codigopincho) es valido.
    *	Parámetros:
    *		$cod: es el código del pincho que se quiere validar.
    *	Return: devuelve la información del pincho asociado al código, si es válido, sino devuelve FALSE.
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

    /* 	Funcion que recupera la información del pincho al que esta asociado $cod (codigopincho).
    *	Parámetros:
    *		$cod: es el código del pincho que se quiere consultar.
   	*	Return: devuelve la información de dicho pincho.
    */
    function recuperarPincho($cod) {
        $pincho = new Pincho();
        $codPincho = new CodigoPincho();
        $res = $codPincho->recuperar($cod);
        $data = mysqli_fetch_assoc($res);
        $id = $data['pincho_idpincho'];
        return $pincho->recuperar($id);
    }

    /* 	Funcion que comprueba que el $cod (codigopincho) que se le pasa por parámetro existe y el campo likes de la tupla esta a null.
    *	Parámetros:
    *		$cod: es el código del pincho que se quiere comprobar si existe
    *	Return: TRUE si el pincho existe y FALSE en caso contrario.
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
?>

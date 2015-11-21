<?php
    /* Devuelve la ruta absoluta desde al raiz del proyecto.
    *  Parametros:
    *       $ruta - Ruta desde la raiz del proyecto hasta el archivo.
    *       $archivo - Nombre del archivo sin la extension.
    *  Return: String con la rutra absoluta.
    */
	function loadclasses($ruta, $archivo) {
		include_once (__DIR__."/$ruta/$archivo");
	}

    function nameclasses($ruta, $archivo) {
        return "$ruta/$archivo";
    }

	// function absolutepath($ruta, $archivo) {
	// 	return __DIR__."/$ruta/$archivo";
	// }

	spl_autoload_register("loadclasses");
?>

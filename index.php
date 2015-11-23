<?php
    session_start();
    ob_start();
    include("loader.php");
    loadclasses("view","header.php"); //'./view/header.php';
    // loadclasses("menus","nomenu.html"); //require_once './menus/nomenu.html';
    if(isset($_SESSION['tipo'])) {
        switch ($_SESSION['tipo']) {
            case 'org':
                loadclasses("menus","menuorganizador.html");
                break;
            case 'jpop':
                loadclasses("menus","menujuradopopular.html");
                break;
            case 'jpro':
                loadclasses("menus","menujuradoprofesional.html");
                break;
            case 'est':
                loadclasses("menus","menuestablecimiento.html");
                break;
            // default:
            //     loadclasses("menus","nomenu.html");
            //     break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
    loadclasses("view/noregister","principal.php"); //require_once './view/noregister/principal.html';
    loadclasses("view","footer.html"); //require_once './view/footer.html';
?>

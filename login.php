<?php

    // require_once './model/Usuarios.php';
    include("loader.php");
    loadclasses("model","Usuarios.php");
    loadclasses("model","BD.php");

    // $sesion = new Sesion();
    // if($sesion->isLogged()) header("Location: ".$sesion->tipo."/.");

    //if(isset($_POST['conectarse'])){
        $login = $_POST['login'];
        $pass = $_POST['password'];
    //}

    if(isset($_POST['iniciarsesion'])) {
        $user = new Usuarios();
        $res = $user->login($login,$pass);
        if($res) {
            session_start();
            $datos = mysqli_fetch_assoc($res);
            switch ($datos['tipo']) {
                case 'org':
                    $_SESSION['login'] = $datos['login'];
                    $_SESSION['tipo'] =$datos['tipo'];
                    header("Location: http://localhost/Zotz/view/organizador/index.php");
                    break;
                case 'jpop':
                    $_SESSION['login'] = $datos['login'];
                    $_SESSION['tipo'] =$datos['tipo'];
                    header("Location: http://localhost/Zotz/view/juradopopular/index.php");
                    break;
                case 'jpro':
                        $_SESSION['login'] = $datos['login'];
                        $_SESSION['tipo'] =$datos['tipo'];
                        header("Location: http://localhost/Zotz/view/juradoprofesional/index.php");
                        break;
                case 'est':
                    $_SESSION['login'] = $datos['login'];
                    $_SESSION['tipo'] =$datos['tipo'];
                    header("Location: http://localhost/Zotz/view/establecimiento/index.php");
                    break;
                // default:
                //     header("Location: http://localhost/Zotz/view/noregister/registro.php");
                //     break;
            }
        }
        else {
            echo '<script> alert("Usuario o contraseña incorrectos");</script>';
            echo '<script> window.location="./view/noregister/registro_login.php";</script>';
        }
    } else if (isset($_POST['cancelar'])) {
        header("Location: http://localhost/Zotz/index.php");
    }
    // else {
    //     header("Location: http://localhost/Zotz/index.php");
    // }

?>

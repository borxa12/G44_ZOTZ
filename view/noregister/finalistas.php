<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    // loadclasses("menus","menuorganizador.html");
    // loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    loadclasses("controller","ControladorOrganizador.php");
    loadclasses("controller","ControladorJuradoProfesional.php");
    loadclasses("controller","ControladorEstablecimiento.php");
    loadclasses("controller","ControladorNoRegistrado.php");
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
?>

<h1>Finalistas</h1>
<?php
    $finalistas = recuperarFinalistas();
    if(mysqli_num_rows($finalistas) == 0) {
        echo '<h4>Aínda non rematou o concuros. Non sexas impaciente.</h4>';
    } else {
        while($f = mysqli_fetch_assoc($finalistas)) {
            $res = recuperarPincho($f['pincho_idpincho']);
            while($r = mysqli_fetch_assoc($res)) {
?>
                <div class="product_box">
                    <a href="" class="pirobox"><img src="<?php echo 'http://localhost/Zotz/img/pincho/'.$r['fotopincho']; ?>" alt="image" class="img"/></a>
                    <h4><?php echo $r['nombrepincho'] ?></h4>
                    <p> <?php
                            $est = recuperarDatosEstablecimiento($r['establecimiento_usuarios_login']);
                            echo $est['nombre'];
                    ?> </p>
                    <p>Nota: <?php echo $f['media'] ?></p>
                    <form name="verfinalista" method="post">
                        <button name="btnver" type="submit" class="btn btn-default button">Ver</button>
                    </form>
                    <?php
                        if(isset($_POST['btnver'])) {
                            header("Location: http://localhost/Zotz/view/noregister/datospincho.php?pincho=".$r['idpincho']);
                        }
                    ?>
                </div>
<?php
            }
        }
    }
?>
<!-- </div> -->
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    // loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    loadclasses("controller","ControladorOrganizador.php");
    loadclasses("controller","ControladorJuradoProfesional.php");
    loadclasses("controller","ControladorEstablecimiento.php");
    if($_SESSION['tipo'] != 'org') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>

<h1>Finalistas</h1>
<?php
    $finalistas = seleccionarFinalistas($_GET['nfinalistas']);
    while($f = mysqli_fetch_assoc($finalistas)) {
        $res = recuperarPincho($f['pincho_idpincho']);
        while($r = mysqli_fetch_assoc($res)) {
?>
<div class="product_box">
    <a href="" class="pirobox"><img src="<?php echo 'http://localhost/Zotz/'.$r['fotopincho']; ?>" alt="image" class="img"/></a>
    <h4><?php echo $r['nombrepincho'] ?></h4>
    <p> <?php
            $est = recuperarDatosEstablecimiento($r['establecimiento_usuarios_login']);
            // while($e = mysqli_fetch_assoc($est)) {
                echo $est['nombre'];
            // }
    ?> </p>
    <form name="verfinalista" method="post">
        <button name="btnver" type="submit" class="btn btn-default button">Ver</button>
    </form>
    <?php
        if(isset($_POST['btnver'])) {
            header("Location: http://localhost/Zotz/view/organizador/datospincho.php?pincho=".$r['idpincho']);
        }
    ?>
    </div>
<?php
        }
    }
?>
<!-- </div> -->
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

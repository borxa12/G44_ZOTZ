<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("controller","ControladorOrganizador.php");

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
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
?>

<h1>Folleto</h1>
<?php
$concurso = concursoActual();
$r = mysqli_fetch_assoc($concurso);
echo "<div>";
echo "<div class='product_box'>";
echo "<img onclick='javascript:this.width=720;this.height=438' ondblclick='javascript:this.width=200;this.height=180' src='../../img/folleto/".$r['folleto']."' alt='O Folleto non está dispoñible' width='100'</img>";
echo '<div>';
echo 'Clic para ampliar';
?>
</div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>
</div>
</div>
<?php loadclasses("view","footer.html"); ?>

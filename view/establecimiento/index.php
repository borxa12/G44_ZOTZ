<?php
    session_start();
    ob_start();

    ini_set('display_errors',1);

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");

    if($_SESSION['tipo'] != 'est') {
        header("Location: ../../index.php");
    } else {
        if(isset($_GET['eliminar'])) {
            if(bajaEstablecimiento($_SESSION['login'])) header("Location: ../../logout.php");
        }
?>
<!-- Contenido principal de la página -->
<h1>Benvid@ <?php echo $_SESSION['login']; ?></h1>
<h3>Grazas por participar no máis fermoso e increíble concurso de pinchos que xamáis foi creado.
    <br/><br/>Deleita a todos coas tuas creación e busca alzarte co maior recoñecemento xamáis ortorgado, o inigualable Concurso de Pinchos de Ourense.</h3>
<h2>Data de Inicio: 4/12/2015</h2>
<h2>Data de Finalización: 7/1/2016</h2>
<!-- </div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div> -->

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

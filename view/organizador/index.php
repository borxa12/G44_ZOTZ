<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
    } else {
?>
<!-- Contenido principal de la página -->
<h1>Benvido <?php echo $_SESSION['login']; ?></h1>
<h3>Organiza con sentidiño.<br/><br/>Polos PINCHOS.<br/><br/>Ministerio de Pinchos. Gobierno de Todos.</h3>
<h2>Fecha de Inicio: 4/12/2015</h2>
<h2>Fecha de Finalización: 7/1/2016</h2>
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

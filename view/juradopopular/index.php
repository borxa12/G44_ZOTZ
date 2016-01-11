<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menujuradopopular.html");

    if($_SESSION['tipo'] != 'jpop') {
        header("Location: ../../index.php");
    } else {
?>
<!-- Contenido principal de la página -->
<h1>Benvid@ <?php echo $_SESSION['login']; ?></h1>
<h3>Grazas por participar no máis fermoso e increíble concurso de pinchos que xamáis foi creado.
    <br/><br/>Exerce o teu voto con responsabilidade.
    <br/><br/>Ministerio de Pinchos. Goberno de Todos.</h3>
<h2>Data de Inicio: 4/12/2015</h2>
<h2>Data de Finalización: 7/1/2016</h2>

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>

<?php loadclasses("view","footer.html"); ?>

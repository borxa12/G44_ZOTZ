<!--Contenido de la pagina principal-->
<?php
loadclasses("controller","ControladorOrganizador.php");

$concurso = concursoActual();
$r = mysqli_fetch_assoc($concurso);

echo "<h1>".$r['titulo']."</h1>";
echo "<h3>".$r['descripcion']."</h3>";
echo "<h2>"."Fecha inicio ".$r['fechac']."</h2>";
echo "<h2>"."Fecha fin  ".$r['fechaf']."</h2>";


?>

<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>
				<h1>Propuestas Gastronómicas</h1>
                <h4> Nombre Pincho : </h4>
                <h4> Ingredientes : </h4>
                <h4> Descripcion : </h4>
                <div class="">
                    <h4> Foto: </h4>
                    <a href="#"><img src="#" alt="image" class="img"/></a>
                </div>
                <div class="button">
                    <form id="evaluacionpincho" method="post">
                        <button type="submit" formaction="propuestasgastronomicas.php" class="btn btn-default button">Aceptar</button>
                        <button type="submit" formaction="propuestasgastronomicas.php" class="btn btn-default button">Denegar</button>
                    </form>
                </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

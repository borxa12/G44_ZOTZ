<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>
                <h1>Finalistas</h1>
                <div class="product_box">
                    <a href="" class="pirobox"><img src="" alt="image" class="img"/></a>
                    <h4>Nombre Pincho</h4>
                    <p> Establecimiento </p>
                    <form id="verfinalista" method="post">
                        <button type="submit" formaction="datospincho.php" class="btn btn-default button">Ver</button>
                    </form>
                </div>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

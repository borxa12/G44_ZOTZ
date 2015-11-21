<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>
				 <h1>Pinchos</h1>

                <div class="product_box">
                    <a href=""  ><img src="" alt="image" class="img" /></a>
                    <h4>Nombre Pincho</h4>
                    <p> Descripción </p>
                    <form id="asinaciondejurado" method="post">
                        <button type="submit" formaction="asignarjurado.php" class="btn btn-default button">Asignar Jurado</button>
                    </form>
                </div>
            </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

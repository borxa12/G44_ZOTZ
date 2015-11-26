<?php
    session_start();
    ob_start();
    include_once("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'est') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
				 <form  id="codigos" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Código</h4>
                            </div>
                            <div>
                                <?php 
                                    //$concurso = new Concurso();
                                    $res = concursoActual();
                                    $data = mysqli_fetch_assoc($res);
                                    $ed = $data['edicion'];
                                    $cod = generarCodigos($_SESSION['login'], $ed);
                                    if($cod == false){
                                        echo "<h1> No tienes ningún pincho aceptado en la edición actual</h1>";
                                    }
                                ?>
                                <h1 id="code"><?php echo $cod;?></h1>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
                <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

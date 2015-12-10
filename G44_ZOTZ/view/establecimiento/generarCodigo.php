<?php
    session_start();
    ob_start();
    ini_set('display_errors',1);
    include_once("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'est') {
        header("Location: ../../index.php");
    } else {
?>
    <h1>Xerar Códigos</h1>
                <div class="product_box">
                    <h4>Número de códigos</h4>
                    <form name="generarcodigos" method="post">
                    <!-- Introcucir el número de códigos a generar -->
                        <div id=templatemo_form>
                            <div>
                                <input name="numcod" type="number" required/>
                                <br></br>
                            </div>
                        </div>
                        <button name="btncod" type="submit" class="btn btn-default button">Xerar códigos</button>
                        <?php
                            if(isset($_POST['btncod'])){
                                $num = $_POST['numcod'];
                                //recuperar la edición actual
                                $res = concursoActual();
                                $data = mysqli_fetch_assoc($res);
                                $ed = $data['edicion'];
                                //generar los códigos
                                $cod = generarCodigos($_SESSION['login'], $ed, $num);
                                if($cod == false){
                                    //Si no hay un picnho aceptado para la edición actual
                                    echo "<h1> Non tes ningún pincho aceptado para a edición actual</h1>";
                                }else{
                                    //mostrar los códigos por pantalla
                                    for ($i=0; $i<count($cod); $i++){
                                        echo "<h1> $cod[$i]</h1>";
                                    }
                                }
                            }
                        ?>
                    </form>
                </div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>
<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");

    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
    } else {
?>
                <h1>Selección de Ganadores</h1>
                <div class="product_box">
                    <h4>Número de Ganadores</h4>
                    <form name="seleccionarganadores" method="post">
                        <div id=templatemo_form>
                            <div>
                                <input name="nganadores" type="number" required/>
                                <br></br>
                            </div>
                        </div>
                        <button name="btnganadores" type="submit" class="btn btn-default button">Publicar Ganadores</button>
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

<?php
    if(isset($_POST['btnganadores'])) {
        if(comprobarFinalistas($_POST['nganadores'])) {
            $res = seleccionarGanadores($_POST['nganadores']);
            header("Location: ../noregister/ganadores.php");
        } else {
            echo '<script> alert("Excedeu o n\u00famero de finalistas.");</script>';
            // echo '<script> window.location="";</script>';
        }
    }
?>

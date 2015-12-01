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
                <h1>Selección de Finalistas</h1>
                <div class="product_box">
                    <h4>Número de Finalistas</h4>
                    <form name="seleccionarfinalistas" method="post">
                        <div id=templatemo_form>
                            <div>
                                <input name="nfinalistas" type="number" required/>
                                <br></br>
                            </div>
                        </div>
                        <button name="btnfinalistas" type="submit" class="btn btn-default button">Publicar Finalistas</button>
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
    if(isset($_POST['btnfinalistas'])) {
        if(comprobarParticipantes($_POST['nfinalistas'])) {
            $res = seleccionarFinalistas($_POST['nfinalistas']);
            header("Location: ../noregister/finalistas.php");
        } else {
            echo '<script> alert("Excedeu o n\u00famero de participantes.");</script>';
            // echo '<script> window.location="";</script>';
        }
    }
?>

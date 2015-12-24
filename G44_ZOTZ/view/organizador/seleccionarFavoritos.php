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
                <h1>Selección de Favoritos</h1>
                <div class="product_box">
                    <h4>Número de Favoritos</h4>
                    <form name="seleccionarfavoritos" method="post">
                        <div id=templatemo_form>
                            <div>
                                <input name="nfavoritos" type="number" required/>
                                <br></br>
                            </div>
                        </div>
                        <button name="btnfavoritos" type="submit" class="btn btn-default button">Publicar Favoritos</button>
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
    if(isset($_POST['btnfavoritos'])) {
        if(comprobarParticipantes($_POST['nfavoritos'])) {
            $res = seleccionarFavoritos($_POST['nfavoritos']);
            header("Location: ../noregister/favoritos.php");
        } else {
            echo '<script> alert("Excedeu o n\u00famero de participantes.");</script>';
            // echo '<script> window.location="";</script>';
        }
    }
?>

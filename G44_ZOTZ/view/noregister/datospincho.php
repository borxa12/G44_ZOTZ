<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("controller","ControladorJuradoProfesional.php");

    if(isset($_SESSION['tipo'])) {
        switch ($_SESSION['tipo']) {
            case 'org':
                loadclasses("menus","menuorganizador.html");
                break;
            case 'jpop':
                loadclasses("menus","menujuradopopular.html");
                break;
            case 'jpro':
                loadclasses("menus","menujuradoprofesional.html");
                break;
            case 'est':
                loadclasses("menus","menuestablecimiento.html");
                break;
        }
    } else {
        loadclasses("menus","nomenu.html");
    }
    $res = recuperarPincho($_GET['pincho']);
    while($r = mysqli_fetch_assoc($res)) {
?>
		<form id="registropincho" method="post">
            <div id=templatemo_form>
                <div>
                    <label for="nombrepincho">Nome</label>
                    <h4> <?php echo $r['nombrepincho'] ?> </h4>
                    <br></br>
                </div>
                <div>
                    <label for="descripcionpincho">Descrición</label>
                    <h4><?php echo $r['descripcionpincho'] ?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="ingrdientespincho">Ingredientes</label>
                    <h4><?php echo $r['ingredientesp'] ?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="fotopincho">Foto</label>
                    <img src="<?php echo '../../img/pinchos/'.$r['fotopincho']; ?>" alt="image" class="img">
                    <br></br>
                </div>
		    </div>
            <button type="submit" formaction="pinchos.php" class="btn btn-default button">Ir a Pinchos</button>
            <button type="submit" formaction="finalistas.php" class="btn btn-default button">Ir a Pinchos Finalistas</button>
        </form>
    <?php
        }
    ?>
        <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

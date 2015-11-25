<?php
    session_start();
    ob_start();
    ini_set("display_errors",1);
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'est') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
      $id = $_GET['idpincho'];
      if(isset($_POST['modificar'])){
        $nombre = $_POST['nombrepincho'];
        $descripcion = $_POST['descripcionpincho'];
        $ingredientes = $_POST['ingredientespincho'];
        $precio = $_POST['precio'];
        $res = recuperarDatosPincho($id);
        $pincho = mysqli_fetch_assoc($res);
        $foto = $pincho['fotopincho'];
        if($_FILES['fotopincho']['name']!=''){
          $concurso=$pincho['concurso_edicion'];
          $trozos = explode(".", $_FILES['fotopincho']['name']);
          $extension = end($trozos);
          $foto = "pincho_".$concurso."_".$_SESSION['login'].".".$extension;
          move_uploaded_file($_FILES['fotopincho']['tmp_name'], "../../img/pinchos/".$foto);
        }
        modificarDatosPincho($id, $nombre, $foto, $descripcion, $ingredientes, $precio);
      }
      $res = recuperarDatosPincho($id);
      $pincho = mysqli_fetch_assoc($res);
?>
		<form id="registropincho" method="post">
            <div id=templatemo_form>
                <div>
                    <label for="nombrepincho">Nombre</label>
                    <h4><?php echo $pincho['nombrepincho'];?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="descripcionpincho">Descripcion</label>
                    <h4><?php echo $pincho['descripcionpincho'];?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="ingrdientespincho">Ingredientes</label>
                    <h4><?php echo $pincho['ingredientesp'];?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="precio">Precio</label>
                    <h4><?php echo $pincho['precio'];?></h4>
                    <br></br>
                </div>
                <div>
                    <label for="fotopincho">Foto</label>
                    <?php echo "<img src='../../img/pinchos/".$pincho['fotopincho']."' alt='image' class='img'>"; ?>
                    <br></br>
                </div>
		    </div>
            <button type="submit" formaction="gestionpinchos.php" class="btn btn-default button">Volver</button>
            <?php
              if($pincho['aceptado']=='N')echo "<button type='submit' formaction='modificarpincho.php?idpincho=".$pincho['idpincho']."' class='btn btn-default button'>Modificar</button>";
             ?>
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

<?php
    session_start();
    ob_start();

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("controller","ControladorNoRegistrado.php");

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
    $r = mysqli_fetch_assoc($res)
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
    <br>
        <br>
    <?php
        if($_SESSION['tipo']=="jpop"){
          ?>
          <form name="comentar" id="form_comentario" method="post">
                <label><b class="texto_azul" >Comentar:</b><br /></label>
                <textarea name="comentario" cols="50" rows="7" class="Textgen" ></textarea>
                <br>
                <input type="submit" name="publicar" value="Publicar" class="btn btn-default button"/>

        </form>

        <br>
        <br>
        <?php
          if(isset($_POST["publicar"])){
              guardarComentario($r['idpincho'],$_SESSION['login'],$_POST['comentario']);
          }
        }
        $comentarios = obtenerComentarios($r['idpincho']);
        if($comentarios){
          while($comentario = mysqli_fetch_assoc($comentarios)){
            echo "<div>";
              echo "<div class='com_capa_ppal'>";
                    echo "<div class='cabecera'>";
                       echo "<span class='usuario'>".$comentario["usuarios_login"]."</span>";
                       echo "<span class='fecha'>".$comentario["fecha"]."</span>";
              echo "</div>";
              echo "<div class='cuerpo'>".$comentario["comentario"]."</div>";
              echo "</div>";
            echo "</div>";
          }
        }else{
          echo "Non hay comentarios sobre este pincho";
        }
    ?>
        <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

<?php
    session_start();
    ob_start();

	ini_set("display_errors",1);

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");

    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
		$usuarios= $_SESSION['login'];
    } else {
      $concurso = mysqli_fetch_assoc(concursoActual());
  ?>

  <h1>Modificación dos datos do concurso</h1>
  <form id="modificaredicion" method="post" enctype="multipart/form-data">
      <div id=templatemo_form>
          <div>
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" maxlength=200 value="<?php echo $concurso['titulo'];?>" />
              <br></br>
          </div>
          <div>
              <label for="descripcionconcurso">Descripcion</label>
              <textarea rows="4" name="descripcion" maxlength="1000" /><?php echo $concurso['descripcion'];?></textarea>
              <br></br>
          </div>
          <div>
              <label for="folleto">Folleto</label>
              <input type="file" name="folleto"/>
              <br></br>
          </div>
          <div>
              <label for="gastromapa">Gastromapa</label>
              <input type="file" name="gastromapa"/>
              <br></br>
          </div>
      </div>
      <button name="btnmodificarconcurso" type="submit" class="btn btn-default button">Modificar</button>
  </form>

<?php
    if(isset($_POST['btnmodificarconcurso'])) {
      if (modificarEdicion($_POST['titulo'], $_POST['descripcion'])) {
            echo '<script> alert("Datos modificados con éxito.");</script>';
            header("Location: http://localhost/G44_ZOTZ/index.php");
        } else {
            echo '<script> alert("Erro na modificación dos datos. Intenteo con outro.");</script>';
        }

      }
}
?>

</div>
</div>
</div>
<?php loadclasses("view","footer.html"); ?>

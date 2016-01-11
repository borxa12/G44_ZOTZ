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
  ?>

  <h1>Nova edicion do concurso</h1>
  <form id="registraredicion" method="post" enctype="multipart/form-data">
      <div id=templatemo_form>
          <div>
              <label for="titulo">Titulo</label>
              <input type="text" name="titulo" maxlength=200 required/>
              <br></br>
          </div>
          <div>
              <label for="descripcionconcurso">Descripcion</label>
              <textarea rows="4" name="descripcion" maxlength=1000 required/></textarea>
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
          <div>
              <label for="fecha">Fecha Inicio</label>
              <input type="date" name="fechainicio" placeholder="AA-MM-DD"  pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required />
              <br></br>
          </div>
          <div>
              <label for="fechafin">Fecha Fin</label>
              <input type="date" name="fechafin" placeholder="AA-MM-DD"  pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" required/>
              <br></br>
          </div>
      </div>
      <button name="btnaltaedicion" type="submit" class="btn btn-default button">Dar de alta</button>
  </form>

<?php
    if(isset($_POST['btnaltaedicion'])) {
      if (registrarEdicion($_POST['titulo'], $_POST['descripcion'],
          $_POST['fechainicio'],$_POST['fechafin'],$_SESSION['login'])) {
        echo '<script> alert("Nova edicion rexistrada con exito.");</script>';
      } else {
        echo '<script> alert("Erro na alta da edicion. Intenteo con outro.");</script>';
      }
    }
}
?>

</div>
</div>
</div>
<?php loadclasses("view","footer.html"); ?>

<?php
    session_start();
    ob_start();
    ini_set('display_errors',1);
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: ../../index.php");
    } else {

      $id = $_GET['idpincho'];
      $datos = datosPropuestaGastronomica($id);
      $pincho = mysqli_fetch_assoc($datos);

      if(isset($_POST['guardar'])){
        if(isset($_POST['jurado'])){
        $jurados = $_POST['jurado'];
        asignarPinchosJuradoProfesional($id,$jurados);
        }
        header("Location: ./asignarpinchojuradoprofesional.php");
}

?>
				<form id="registropincho" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombrepincho">Nombre</label>
                            <h4><?php echo $pincho['nombrepincho'];?></h4>
                            </br>
                        </div>
                        <div>
                            <label for="descripcionpincho">Descripcion</label>
                            <p><?php echo $pincho['descripcionpincho'];?></p>
                            </br>
                        </div>
                        <div>
                            <label for="ingrdientespincho">Ingredientes</label>
                            <p><?php echo $pincho['ingredientesp'];?></p>
                            </br>
                        </div>
                        <div>
                            <label for="ingrdientespincho">Ingredientes</label>
                            <p><?php echo $pincho['precio'];?></p>
                            </br>
                        </div>
                        <div>
                            <label for="fotopincho">Foto</label>
                            <img src="../../img/pinchos/<?php echo $pincho['fotopincho'];?>" class="img" alt="image">
                            </br>
                        </div>
						<div>
							<label for="jurado">Miembros del jurado</label></br></br>
              <?php
                $listajurado = listarJuradoProfesionalNoAsignado($id);
                if($listajurado!=null){
                  while($linea = mysqli_fetch_assoc($listajurado)){
                  echo "<input type='checkbox' name='jurado[]' value='".$linea['usuarios_login']."'>".$linea['nombrejuradoprofesional']."<br>";
                }
              }
              ?>
						</div>
				    </div>
					<button name="guardar" type="submit" class="btn btn-default button">Guardar</button>
                </form>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

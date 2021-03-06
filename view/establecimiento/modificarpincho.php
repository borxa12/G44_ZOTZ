<?php
    session_start();
    ob_start();

    ini_set("display_errors",1);

    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    loadclasses("controller","ControladorEstablecimiento.php");

    if($_SESSION['tipo'] != 'est') {
        header("Location: ../../index.php");
    } else {
        $id = $_GET['idpincho'];
        $res = recuperarDatosPincho($id);
        $pincho = mysqli_fetch_assoc($res);
?>
					<form id="registropincho" method="post" enctype="multipart/form-data">
                        <div>
                            <label for="nombrepincho">Nome</label>
                            <?php echo "<input type = 'text' name='nombrepincho' placeholder='Nome Pincho' value='".$pincho['nombrepincho']."' title='Campo incompleto' required />";?>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionpincho">Descrición</label>
                            <?php echo "<textarea rows='4' cols='50' name='descripcionpincho' placeholder='Descrición Pincho' title='Campo incompleto' required >".$pincho['descripcionpincho']."</textarea>"; ?>
                            <br></br>
                        </div>
                        <div>
                            <label for="ingrdientespincho">Ingredientes</label>
                            <?php echo "<textarea rows='4' cols='50' name='ingredientespincho' placeholder='Ingredientes Pincho' title='Campo incompleto' required >".$pincho['ingredientesp']."</textarea>"; ?>
                            <br></br>
                        </div>
                        <div>
                            <label for="precio">Prezo</label>
                            <?php echo "<input type = 'text' name='precio' placeholder='Prezo Pincho' value='".$pincho['precio']."' title='Campo incompleto' required />";?>
                            <br></br>
                        </div>
                        <div>
                            <label for="fotopincho">Foto</label>
                            <?php
                              echo "<img src='../../img/pinchos/".$pincho['fotopincho']."' alt='image' class='img'>";
                             ?>
                            <input name="fotopincho" type="file" id="fotopincho" />
                            <br></br>
                        </div>
					<div>
                <?php
                    echo "<button name='modificar' type='submit' formaction='datospincho.php?idpincho=".$pincho['idpincho']."' class='btn btn-default button'>Gardar Pincho</button>";
                    echo "<button type='submit' formaction='datospincho.php?idpincho=".$pincho['idpincho']."' class='btn btn-default button'>Cancelar</button>";
                  ?>
					</div>
                </form>
				</div>
                <div class="cleaner"></div>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

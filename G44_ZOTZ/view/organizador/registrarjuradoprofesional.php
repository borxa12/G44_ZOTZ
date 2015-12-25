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
    } else {
?>
                <h1>Rexistrar Xurado Profesional</h1>
                <form id="registrojuradoprofesional" method="post" enctype="multipart/form-data">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombrejuradoprofesional">Nome</label>
                            <input type = "text" name="nombrejuradoprofesional" maxlength=60 required />
                            <br></br>
                        </div>
                        <div>
                            <label for="loginjuradoprofesional">Login</label>
                            <input type="text" name="loginjuradoprofesional" maxlength=20 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="emailjuradoprofesional">Email</label>
                            <input title= "mail@example.com" type="email" name="emailjuradoprofesional" maxlength=50 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordjuradoprofesional">Contrasinal</label>
                            <input title="No se admiten Ñ ni acentos" type="password" name="passwordjuradoprofesional" pattern="[^ñáéíóú`´]{1,45}" maxlength=45 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="repetirpasswordjuradoprofesional">Repetir Contrasinal</label>
                            <input title="No se admiten Ñ ni acentos" type="password" name="repetirpasswordjuradoprofesional" pattern="[^ñáéíóú`´]{1,45}" maxlength=45 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="fotojuradoprofesional">Foto</label>
                            <input type="file" name="fotojuradoprofesional"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="reconocimientosjuradoprofesional">Recoñecementos</label>
                            <textarea rows="4" name="reconocimientosjuradoprofesional" maxlength=1000 ></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button name="btnaltaprofesional" type="submit" class="btn btn-default button">Dar de alta</button>
                </form>

                <?php
                    if(isset($_POST['btnaltaprofesional'])) {
                        if(strcmp($_POST['passwordjuradoprofesional'],$_POST['repetirpasswordjuradoprofesional'])) {
                            echo '<script> alert("Las contrase\u00f1as no coinciden");</script>';
                        } else {
							$login = $_POST['loginjuradoprofesional'];
                            if($_FILES['fotojuradoprofesional']['name']) {
                                $foto = $_FILES['fotojuradoprofesional'];

								move_uploaded_file($_FILES['fotojuradoprofesional']['tmp_name'],"../../img/juradoprofesional/".$login.".jpg");
                            } else {
                                $foto = null;
                            }
                            if (registrarJuradoProfesional($_POST['loginjuradoprofesional'],md5($_POST['passwordjuradoprofesional']),
                                $_POST['emailjuradoprofesional'],$_POST['nombrejuradoprofesional'],$login.".jpg",
                                $_POST['reconocimientosjuradoprofesional'])) {
                                    header("Location: ../noregister/juradoprofesional.php");
                                } else {
                                    echo '<script> alert("O login xa existe. Intenteo con outro.");</script>';
                                }
                        }

                    }
                ?>

    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

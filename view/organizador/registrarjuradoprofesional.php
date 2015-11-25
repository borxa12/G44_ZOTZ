<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    loadclasses("controller","ControladorOrganizador.php");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
                <h1>Registrar Jurado Profesional</h1>
                <form id="registrojuradoprofesional" method="post" enctype="multipart/form-data"> <!-- action="ControladorOrganizador.php" -->
                    <div id=templatemo_form>
                        <div>
                            <label for="nombrejuradoprofesional">Nombre</label>
                            <input type = "text" name="nombrejuradoprofesional" maxlength=50 required />
                            <br></br>
                        </div>
                        <div>
                            <label for="loginjuradoprofesional">Login</label>
                            <input type="text" name="loginjuradoprofesional" maxlength=20 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="emailjuradoprofesional">Email</label>
                            <input title= "mail@example.com" type="email" name="emailjuradoprofesional" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" maxlength=50 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordjuradoprofesional">Password</label>
                            <input title="No se admiten Ñ ni acentos" type="password" name="passwordjuradoprofesional" pattern="[^ñáéíóú`´]{1,45}" maxlength=20 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="repetirpasswordjuradoprofesional">Repetir Password</label>
                            <input title="No se admiten Ñ ni acentos" type="password" name="repetirpasswordjuradoprofesional" pattern="[^ñáéíóú`´]{1,45}" maxlength=20 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="fotojuradoprofesional">Foto</label>
                            <input type="file" name="fotojuradoprofesional"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="reconocimientosjuradoprofesional">Reconocimientos</label>
                            <textarea rows="4" name="reconocimientosjuradoprofesional" maxlength=1000 ></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button name="btnaltaprofesional" type="submit" class="btn btn-default button">Dar de alta</button> <!-- formaction="http://localhost/Zotz/view/noregister/juradoprofesional.php" -->
                </form>

                <?php
                    if(isset($_POST['btnaltaprofesional'])) {
                        if(strcmp($_POST['passwordjuradoprofesional'],$_POST['repetirpasswordjuradoprofesional'])) {
                            echo '<script> alert("Las contraseñas no coinciden");</script>';
                            // echo '<script> window.location="./registrarestablecimiento.php";</script>';
                        } else {
							$login = $_POST['loginjuradoprofesional'];
                            if($_FILES['fotojuradoprofesional']['name']) {
                                $foto = $_FILES['fotojuradoprofesional'];
								move_uploaded_file($_FILES['fotojuradoprofesional']['tmp_name'],"../../img/juradoprofesional/".$login.".jpg");
                            } else {
                                $foto = null;
                            }
                            if (registrarJuradoProfesional($_POST['loginjuradoprofesional'],$_POST['passwordjuradoprofesional'],
                                $_POST['emailjuradoprofesional'],$_POST['nombrejuradoprofesional'],$login.".jpg",
                                $_POST['reconocimientosjuradoprofesional'])) {
                                    header("Location: http://localhost/Zotz/view/noregister/juradoprofesional.php");
                                } else {
                                    echo '<script> alert("O login xa existe. Tenteo con outro.");</script>';
                                    // echo '<script> window.location="./registrarestablecimiento.php";</script>';
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

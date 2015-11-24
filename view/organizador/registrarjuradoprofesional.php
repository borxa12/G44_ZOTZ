<?php
    session_start();
    ob_start();
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuorganizador.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';

    if($_SESSION['tipo'] != 'org') {
        header("Location: http://localhost/Zotz/index.php");
    } else {
?>
                <h1>Registrar Jurado Profesional</h1>
                <form id="registroestablecimiento" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombrejuradoprofesional">Nombre</label>
                            <input type = "text" id="nombrejuradoprofesional" maxlength=20 required />
                            <br></br>
                        </div>
                        <div>
                            <label for="loginjuradoprofesional">Login</label>
                            <input type="text" id="loginjuradoprofesional" maxlength=50 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="emailjuradoprofesional">Email</label>
                            <input title= "mail@example.com" type="text" id="emailjuradoprofesional" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" maxlength=50 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordjuradoprofesional">Password</label>
                            <input title="Longitud máxima : 20" type="password" id="passwordjuradoprofesional" pattern="![ñ`´]" maxlength=20 required/>
                            <br></br>
                        </div>
                        <div>
                            <label for="fotojuradoprofesional">Foto</label>
                            <input type="file" id="fotojuradoprofesional" />
                            <br></br>
                        </div>
                        <div>
                            <label for="reconocimientosjuradoprofesional">Reconocimientos</label>
                            <textarea rows="4" id="reconocimientosjuradoprofesional" maxlength=1000 ></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button type="submit" formaction="ControladorOrganizador.php" class="btn btn-default button">Dar de alta</button>
                </form>
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php
    }
?>
<?php loadclasses("view","footer.html"); ?>

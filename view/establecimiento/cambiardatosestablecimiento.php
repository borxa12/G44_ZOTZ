<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","menuestablecimiento.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>

            <h1>Modificar Establecimiento</h1>
                <div class="cleaner_h40"></div>
                <br></br>

                <form id="modificarestablecimiento" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombreestablecimiento">Nombre</label>
                            <input type = "text" id="nombreestablecimiento" placeholder="Nombre establecimiento" value="Datos de la BD"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="direccionestablecimiento">Dirección</label>
                            <input type = "text" id="direccionestablecimiento" placeholder="Dirección establecimiento" value="Datos de la BD"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="telefonoestablecimiento">Teléfono</label>
                            <input type="tel" id="telefonoestablecimiento" placeholder="Teléfono del establecimiento" value="Datos de la BD"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="webestablecimiento">Web</label>
                            <input type = "text" id="webestablecimiento" placeholder="Web establecimiento" value="Datos de la BD"/>
                            <br></br>
                        </div>
                        <div>
                            <label  for="loginestablecimiento">Login</label>
                            <input type="text" id="loginestablecimiento" placeholder="Login establecimiento" value="Datos de la BD"/>
                            <br></br>
                            </div>
                        <div>
                            <label for="emailestablecimiento">Email</label>
                            <input type="email" id="emailestablecimiento" placeholder="Email establecimiento" value="Datos de la BD"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordestablecimiento">Password</label>
                            <input type="password" id="passwordjuradoprofesionalinput" placeholder="Nueva password"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="comfirmarpasswordestablecimiento">Confirmar Password</label>
                            <input type="password" id="comfirmarpasswordestablecimientoinput" onblur="validar();" placeholder="Repetir la nueva password"/>
                            <span id="mensajeerror" hidden="true">Las contraseñas no coinciden</span>
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descripción</label>
                            <textarea rows="4" cols="50" id="descripcionestablecimiento" placeholder="Nueva descripción">Descripción establecimiento de la BD</textarea>
                            <br></br>
                        </div>
                    </div>
                    <button type="submit" formaction="modificarestablecimiento.php" class="btn btn-default button">Guardar</button>
                    <button type="submit" formaction="modificarestablecimiento.php" class="btn btn-default button">Cancelar</button>
                </form>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

<?php
    include("../../loader.php");
    loadclasses("view","header.php");
    loadclasses("menus","nomenu.html");
    //require_once '../header.php';
    //require_once '../../menus/nomenu.html';
?>
            <h1>Registrar Establecimiento</h1>
                <form id="registroestablecimiento" method="post">
                    <div id=templatemo_form>
                        <div>
                            <label for="nombreestablecimiento">Nombre</label>
                            <input type="text" id="nombreestablecimiento" />
                            <br></br>
                        </div>
                        <div>
                            <label for="direccionestablecimiento">Dirección</label>
                            <input type="text" id="direccionestablecimiento" />
                            <br></br>
                        </div>
                        <div>
                            <label for="telefonoestablecimiento">Teléfono</label>
                            <input type="tel" pattern="[0-9]" maxlength="9" id="telefonoestablecimiento"/>
                            <br></br>
                        </div>
                        <div>
                            <label for="webestablecimiento">Web</label>
                            <input type="text" id="webestablecimiento" />
                            <br></br>
                        </div>
                        <div>
                            <label for="loginestablecimiento">Login</label>
                            <input type="text" id="loginestablecimiento" />
                            <br></br>
                            </div>
                        <div>
                            <label for="emailestablecimiento">Email</label>
                            <input type="email" id="emailestablecimiento" />
                            <br></br>
                        </div>
                        <div>
                            <label for="passwordjuradoprofesional">Password</label>
                            <input type="password" id="passwordjuradoprofesional" />
                            <br></br>
                        </div>
                        <div>
                            <label for="fotojuradoprofesional">Foto</label>
                            <input type="file" id="fotojuradoprofesional" />
                            <br></br>
                        </div>
                        <div>
                            <label for="descripcionestablecimiento">Descripción</label>
                            <textarea rows="4" id="descripcionestablecimiento"></textarea>
                            <br></br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-default button" formaction="../establecimiento/modificarestablecimiento.php">Dar de alta</button>
                    <button type="submit" formaction="establecimientos.php" class="btn btn-default button">Volver</button>
                </form>

            <div class="cleaner"></div>
	</div>
	<div class="col-xs-12 col-sm-12 col-md-1"></div>
    </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-1"></div>
</div>

<?php loadclasses("view","footer.html"); ?>

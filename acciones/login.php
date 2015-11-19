<!-- Login Modal Page -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <a href="registro.html"><button type="button" class="btn btn-register">Registrarse</button></a>
                <h4 class="modal-title osSansFont" id="myModalLabel">Registro</h4>
            </div>

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form name="sentMessage" id="loginForm" novalidate>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Login</label>
                            <input type="text" class="form-control" placeholder="Login" id="login" required data-validation-required-message="Introduzca su login">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Contraseña" id="password" required data-validation-required-message="Introduzca su contraseña">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn-login">Iniciar sesion</button>
            </div>
        </div>
    </div>
</div>

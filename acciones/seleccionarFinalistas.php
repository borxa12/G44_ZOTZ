<!-- Seleccionar Finalistas Modal Page -->
<div class="modal fade" id="seleccionarFinalistas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form  id="nfinalistas" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Número de Finalistas</h4>
                            </div>
                            <input type="number" class="form-control" placeholder="Número de Finalistas" id="nfinalista" required data-validation-required-message="Intruduzca el número de finalistas">
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <a href="seleccionarfinalistas.html"><button type="submit" class="btn btn-register">Seleccionar Finalistas</button></a>
            </div>
        </div>
    </div>
</div>

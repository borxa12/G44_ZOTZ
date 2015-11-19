<!-- Confirmación Modal Page -->
<div class="modal fade" id="confirmacionVotoPincho" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <!-- Contenido de la página modal -->
            <div class="modal-body">
                <form  id="nfinalistas" method="post">
                    <div class="row">
                        <div class="form-group col-xs-12 floating-label-form-group controls">
                            <div>
                                <h4>Confirmación</h4>
                            </div>
                            <div>
                                <h2>¿Está seguro de querer votar a este pincho?</h2>
                            </div>
                            <p class="help-block text-danger"></p>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <form id="confirmacion" method="post">
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    <button type="submit" formaction="index.html" class="btn btn-register">Si</button>
                </form>
            </div>
        </div>
    </div>
</div>

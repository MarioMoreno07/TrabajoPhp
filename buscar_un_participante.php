
<?php
include_once("aplicacionPhp.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_buscar_participante.php" name="frmBuscarparticipante" id="frmBuscarparticipante" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar un Participante</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombreParticipante">Id</label>
                    <div class="col-xs-4">
                        <input id="txtNombreParticipante" name="txtNombreParticipante" placeholder="Nombre del participante" class="form-control input-md" type="text">
                    </div>
                </div>
                
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarParticipante"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarParticipante" name="btnAceptarBuscarParticipante" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>
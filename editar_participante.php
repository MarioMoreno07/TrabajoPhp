<?php

// Recupero datos de parametro en forma de array asociativo
$participante = json_decode($_POST['participante'],true);

require_once("config.php");
$conexion = obtenerConexion();

$sql = "SELECT id FROM Eventos;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // Si coincide el tipo con el del componente es el que debe aparecer seleccionado (selected)
    if ($fila['id'] == $participante['id_evento']){
        $options .= " <option selected value='" . $fila["id"] . "'>" . $fila["id"] . "</option>";
    } 
}

// Cabecera HTML que incluye navbar
include_once("aplicacionPhp.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_modificar_participante.php" name="frmAltacomponente" id="frmAltacomponente" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Modificación de Participante</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="id">Id</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $participante['id']?>" id="id" name="id" placeholder="Id del componente" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombre">Nombre</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $participante['name']?>" id="txtNombre" name="txtNombre" placeholder="Nombre del componente" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtEmail">Email</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $participante['email']?>" id="txtEmail" name="txtEmail" placeholder="Email" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtDescripcion">Descripcion</label>
                    <div class="col-xs-4">
                        <input value="<?php echo $participante['descripcion']?>" id="txtDescripcion" name="txtDescripcion" placeholder="Descripcion" class="form-control input-md" type="text" step="0.01">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstid">Evento</label>
                    <div class="col-xs-4">
                        <select name="lstid" id="lstid" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <input value="<?php echo $participante['id_evento']?>" type='hidden' name='id_evento' id='id_evento' />
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarAltaComponente"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarAltaComponente" name="btnAceptarAltaComponente" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>

    </div>
</div>
</body>

</html>
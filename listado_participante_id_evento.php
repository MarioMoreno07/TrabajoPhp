<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT DISTINCT e.nombre as evento FROM Participantes p, Eventos e 
        WHERE p.id_evento = e.id;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    $options .= "<option value='" . $fila["evento"] . "'>" . $fila["evento"] . "</option>";
}

include_once("aplicacionPhp.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_listado_eventos_id_evento.php" method="get">
            <fieldset>
                <!-- Form Name -->
                <legend>Buscar participantes por evento</legend>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstNombre">Evento de los participantes</label>
                    <div class="col-xs-4">
                        <select name="lstNombre" id="lstNombre" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
                <!-- Button -->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="btnAceptarBuscarComponentesTipo"></label>
                    <div class="col-xs-4">
                        <input type="submit" id="btnAceptarBuscarComponentesTipo" name="btnAceptarBuscarComponentesTipo" class="btn btn-primary" value="Aceptar" />
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>
</html>

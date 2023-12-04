<?php
require_once("config.php");

$conexion = obtenerConexion();

$sql = "SELECT id,nombre FROM Eventos;";

$resultado = mysqli_query($conexion, $sql);

$options = "";
while ($fila = mysqli_fetch_assoc($resultado)) {
    // $tipos[] = $fila; // Insertar una fila al final
    $options .= " <option value='" . $fila["id"] . "'>" . $fila["nombre"] . "</option>";
}

?>


<?php
include_once("aplicacionPhp.html");
?>

<div class="container" id="formularios">
    <div class="row">
        <form class="form-horizontal" action="proceso_alta_participante.php" name="frmAltaparticiapnte" id="frmAltaparticiapnte" method="post">
            <fieldset>
                <!-- Form Name -->
                <legend>Alta de Participante</legend>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtNombre">Nombre</label>
                    <div class="col-xs-4">
                        <input id="txtNombre" name="txtNombre" placeholder="Nombre del participante" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtemail">Email</label>
                    <div class="col-xs-4">
                        <input id="txtemail" name="txtemail" placeholder="email" class="form-control input-md" type="text">
                    </div>
                </div>
                <!-- Text input-->
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="txtdescripcion">descripcion</label>
                    <div class="col-xs-4">
                        <input id="txtdescripcion" name="txtdescripcion" placeholder="Descripcion" class="form-control input-md" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-4 control-label" for="lstId">Id_Evento</label>
                    <div class="col-xs-4">
                        <select name="lstId" id="lstId" class="form-select" aria-label="Default select example">
                            <?php echo $options; ?>
                        </select>
                    </div>
                </div>
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
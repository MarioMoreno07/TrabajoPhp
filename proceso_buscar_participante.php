<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetro
$id = $_GET['txtNombreParticipante'];

$sql = "SELECT *  FROM Participantes 
WHERE id = $id;";

$resultado = mysqli_query($conexion, $sql);

// Pedir una fila
$fila = mysqli_fetch_assoc($resultado);

if($fila){ // Mostrar tabla de datos

    $mensaje = "<h2 class='text-center'>Participante localizado</h2>";
    $mensaje .= "<table class='table'>";
    $mensaje .= "<thead><tr><th>id</th><th>NOMBRE</th><th>Email</th><th>Descripcion</th><th>Id_Evento</th></tr></thead>";
    $mensaje .= "<tbody><tr>";
    $mensaje .= "<td>" . $fila['id'] . "</td>";
    $mensaje .= "<td>" . $fila['name'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td>" . $fila['id_evento'] . "</td>";

    // Formulario en la celda para procesar borrado del registro
    $mensaje .= "<td><form action='proceso_borrar_participante.php' method='post'>";  
    // input hidden para enviar idcomponente a borrar
    $mensaje .= "<input type='hidden' name='id' value='$id'/>";  
    $mensaje .= "<input type='submit' value='Borrar' class='btn btn-primary'/> </form>";



    $mensaje .= "<td><form class='d-inline me-1' action='editar_participante.php' method='post'>";
    $mensaje .= "<input type='hidden' name='participante' value='" . htmlspecialchars(json_encode($fila),ENT_QUOTES) . "' />";
    $mensaje .= "<button name='submit' value='Editar' class='btn btn-primary'><i class='bi bi-pencil-square'></i></button></form>";


    $mensaje .= "</tr></tbody></table>";
    
} else { // No hay datos
   $mensaje = "<h2 class='text-center mt-5'>El participante con id $id no está registrado</h2>";
}

// Insertamos cabecera
include_once("aplicacionPhp.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>

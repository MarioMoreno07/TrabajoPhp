<?php
require_once("config.php");
$conexion = obtenerConexion();

// No hay parámetros

$sql = "SELECT e.nombre as evento , p.*  FROM Participantes p , Eventos e 
WHERE p.id_evento = e.id;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Montar tabla
$mensaje = "<h2 class='text-center'>Listado de componentes</h2>";
$mensaje .= "<table class='table table-striped table-dark'>";
$mensaje .= "<thead><tr><th>Id</th><th>NOMBRE</th><th>Email</th><th>Descripcion</th><th>Evento</th></tr></thead>";
$mensaje .= "<tbody>";

// Recorrer filas
while ($fila = mysqli_fetch_assoc($resultado)) {
    $mensaje .= "<tr><td>" . $fila['id'] . "</td>";
    $mensaje .= "<td>" . $fila['name'] . "</td>";
    $mensaje .= "<td>" . $fila['email'] . "</td>";
    $mensaje .= "<td>" . $fila['descripcion'] . "</td>";
    $mensaje .= "<td>" . $fila['evento'] . "</td></tr>";
}

// Cerrar tabla
$mensaje .= "</tbody></table>";

// Insertamos cabecera
include_once("aplicacionPhp.html");

// Mostrar mensaje calculado antes
echo $mensaje;

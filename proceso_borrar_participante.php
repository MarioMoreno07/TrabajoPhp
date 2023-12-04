<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$id = $_POST['id'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir delete
$sql = "DELETE FROM Participantes WHERE id = $id;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Componente con id $id borrado</h2>"; 
}

include_once("aplicacion.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
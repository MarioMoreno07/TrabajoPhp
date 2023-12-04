<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$id = $_POST['id'];
$name = $_POST['txtNombre'];
$email = $_POST['txtEmail'];
$descripcion = $_POST['txtDescripcion'];
$id_evento = $_POST['lstid'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir update
$sql = "UPDATE Participantes SET name = '" . $name . "' , email = '" . $email . "' , descripcion = '" . $descripcion . "' , id_evento = $id_evento
 WHERE id = $id ;";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);




// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Participante actualizado</h2>"; 
}

// Aquí empieza la página
include_once("aplicacionPhp.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
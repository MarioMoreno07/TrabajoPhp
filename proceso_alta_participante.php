<?php
require_once("config.php");
$conexion = obtenerConexion();

// Recuperar parámetros
$name = $_POST['txtNombre'];
$email = $_POST['txtemail'];
$descripcion = $_POST['txtdescripcion'];
$id_evento = $_POST['lstId'];

// No validamos, suponemos que la entrada de datos es correcta

// Definir insert
$sql = "INSERT INTO Participantes(`id`, `name`, `email`, `descripcion`, `id_evento`) 
                VALUES (null,'" . $name . "', '" . $email . "', '" . $descripcion . "' , $id_evento );";

// Ejecutar consulta
$resultado = mysqli_query($conexion, $sql);

// Verificar si hay error y almacenar mensaje
if (mysqli_errno($conexion) != 0) {
    $numerror = mysqli_errno($conexion);
    $descrerror = mysqli_error($conexion);
    $mensaje =  "<h2 class='text-center mt-5'>Se ha producido un error numero $numerror que corresponde a: $descrerror </h2>";
} else {
    $mensaje =  "<h2 class='text-center mt-5'>Participante insertado</h2>"; 
}
// Redireccionar tras 5 segundos al index.
// Siempre debe ir antes de DOCTYPE
header( "refresh:5;url=index.php" );
?>

<?php
include_once("aplicacionPhp.html");

// Mostrar mensaje calculado antes
echo $mensaje;

?>
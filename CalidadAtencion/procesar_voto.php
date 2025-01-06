<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "c1920349_menuar", "DI61fimuwa", "c1920349_menuar");
//$mysqli = mysqli_connect("localhost", "c1920349_menuar", "DI61fimuwa", "c1920349_menuar");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre_empleado = $_POST['empleado'];
$voto = $_POST['voto'];

// Obtener la fecha y hora actual
$fecha_hora = date('Y-m-d H:i:s');

// Insertar voto en la base de datos
$sql = "INSERT INTO votos (empleado, voto, fecha_hora) VALUES ('$nombre_empleado', '$voto', '$fecha_hora')";

if ($conexion->query($sql) === TRUE) {
    echo "Voto registrado exitosamente";
    header("location:index.php");
    echo "No funca el header";
} else {
    echo "Error al registrar el voto: " . $conexion->error;
}

$conexion->close();
?>
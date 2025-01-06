<?php 
$mysqli = mysqli_connect("localhost", "c1920349_menuar", "DI61fimuwa", "c1920349_menuar");
//$mysqli = mysqli_connect("localhost", "root", "", "qr_catalogo");
if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_set_charset($mysqli, "utf8");
?>
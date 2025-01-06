<?php 
$mysqli = mysqli_connect("localhost", "c1920349_prueba", "DI61fimuwa", "c1920349_prueba");
//$mysqli = mysqli_connect("localhost", "root", "", "menu_catalogo");
if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_set_charset($mysqli, "utf8");
?>
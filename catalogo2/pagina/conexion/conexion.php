<?php 
//$mysqli = mysqli_connect("localhost", "c1940715_menu", "49dinedaBO", "c1940715_menu");
$mysqli = mysqli_connect("localhost", "root", "", "menu_catalogo");
if (!$mysqli) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
mysqli_set_charset($mysqli, "utf8");
/*echo "Éxito: Se realizó una conexión apropiada a MySQL! La base de datos mi_bd es genial." . PHP_EOL;
echo "Información del host: " . mysqli_get_host_info($enlace) . PHP_EOL;

mysqli_close($enlace);*/

?>
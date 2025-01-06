<?php
define('DB_SERVER', 'localhost');
define('DB_SERVER_USERNAME', 'YOUR DATA BASE USERNAME');
define('DB_SERVER_PASSWORD', 'YOUR DATA BASE PASSWORD');
define('DB_DATABASE', 'YOUR DATA BASE NAME');

$connexion = new mysqli(DB_SERVER, DB_SERVER_USERNAME, DB_SERVER_PASSWORD, DB_DATABASE);

$html = '';
$key = $_POST['key'];

$result = $connexion->query(
    'SELECT * FROM ps_product p 
    LEFT JOIN ps_product_lang pl ON (pl.id_product = p.id_product AND pl.id_lang = 1) 
    WHERE active = 1 
    AND pl.name LIKE "%'.strip_tags($key).'%"
    ORDER BY date_upd DESC LIMIT 0,5'
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<div><a class="suggest-element" data="'.utf8_encode($row['name']).'" id="product'.$row['id_product'].'">'.utf8_encode($row['name']).'</a></div>';
    }
}
echo $html;
?>
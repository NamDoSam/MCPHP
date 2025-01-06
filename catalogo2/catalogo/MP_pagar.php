<?php
// SDK de Mercado Pago
require ('MP_pago/vendor/autoload.php');
//require __DIR__ .  'MP_pago/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-3008919461038921-092722-60440481b25a063ea2bbbe853c8490cb-651989675');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();

$preference->back_urls = array(
    "success" => "https://www.tu-sitio/success",
    "failure" => "http://www.tu-sitio/failure",
    "pending" => "http://www.tu-sitio/pending"
);

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = $_SESSION['nomFantasia'];
$item->quantity = 1;
$item->unit_price = $_SESSION['totalPago'];
$preference->items = array($item);
$preference->save();

//'TEST-1099071481437615-122519-12664b6950892a652dafeb482f761506__LB_LA__-57975298'

//curl -X POST -H "Content-Type: application/json" "https://api.mercadopago.com/users/test_user?access_token=TEST-1099071481437615-122519-12664b6950892a652dafeb482f761506__LB_LA__-57975298" -d "{'site_id':'MLA'}"

/////TOKEN VENDEDOR///////////////////
//{"id":651989675,"nickname":"TETE6597609","password":"qatest2968","site_status":"active","email":"test_user_81331387@testuser.com"}

/////TOKEN COMPRADOR///////////////////
//{"id":651990814,"nickname":"TESTTTVNOWQR","password":"qatest7477","site_status":"active","email":"test_user_62663678@testuser.com"}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Mercado Pago</title>
</head>

<body>
<div align="center">
<form action="/procesar-pago" method="POST">
  <script
   src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
   data-preference-id="<?php echo $preference->id; ?>">
  </script>
</form>
</div>
</body>
</html>
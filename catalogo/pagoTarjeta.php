<style>
.mercadopago-button{
	background-color:#C06 !important;
	/*padding: 0.3rem 0.75rem;*/
	font-size: 0.87rem;
	border-radius: 0.25rem
}
</style>

<?php
	// SDK de Mercado Pago
	require __DIR__ .  '/mercadoPago/vendor/autoload.php';

	// Agrega credenciales$key
	//MercadoPago\SDK::setAccessToken('TEST-1099071481437615-122519-12664b6950892a652dafeb482f761506__LB_LA__-57975298');
	
	//MercadoPago\SDK::setAccessToken('TEST-3008919461038921-092722-60440481b25a063ea2bbbe853c8490cb-651989675');
	MercadoPago\SDK::setAccessToken($key['access_token']);
	
	$preference = new MercadoPago\Preference();
	
	$preference->payment_methods = array(
	  "excluded_payment_types" => array(
		array("id" => "ticket")
	  ),
	);
	$preference->back_urls = array(
    "success" => $url_vase."shopCar/pago_MercadoPago.php&c=$slug",
    "failure" => $url_vase."pagar.php?var=failure&c=$slug",
    "pending" => $url_vase."pagar.php?var=pending&c=$slug",
	);
	$preference->auto_return = "success";

	// Crea un objeto de preferencia
	$preference = new MercadoPago\Preference();
	$datos=array();
	
	// Crea un ítem en la preferencia
//for($i=0;$i<10;$i++){
	$item = new MercadoPago\Item();
	$item->title = $titulo;
	$item->quantity = 1;
	$item->currency_id = "ARS";
	$item->unit_price = $total;
	$datos[]=$item;
//}
	$preference->items = $datos;
	$preference->save();
?>
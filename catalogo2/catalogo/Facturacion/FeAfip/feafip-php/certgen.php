<?php
/**
 * Created by PhpStorm.
 * User: Abel
 * Date: 5/11/2015
 * Time: 11:05 PM
 */

$dn = array(
    "countryName" => "UK",
    "stateOrProvinceName" => "Somerset",
    "localityName" => "Glastonbury",
    "organizationName" => "The Brain Room Limited",
    "organizationalUnitName" => "PHP Documentation Team",
    "commonName" => "Wez Furlong",
    "emailAddress" => "wez@example.com"
);

// Generar una nueva pareja de clave privada (y pública)
$privkey = openssl_pkey_new();

// Generar una petición de firma de certificado
$csr = openssl_csr_new($dn, $privkey);

// Ahora querrá preservar su clave privada, CSR y certificado
// autofirmado por lo que pueden ser instalados en su servidor web, servidor de correo
// o cliente de correo (dependiendo del uso previsto para el certificado).
// Este ejemplo muestra cómo obtener estas cosas con variables, pero
// también puede almacenarlas directamente en archivos.
// Normalmente, enviará la CSR a su AC, la cuál se la emitirá después
// con el certificado "real".
openssl_csr_export($csr, $csrout) and var_dump($csrout);
openssl_pkey_export($privkey, $pkeyout, "") and var_dump($pkeyout);

// Mostrar cualquier error que ocurra
while (($e = openssl_error_string()) !== false) {
    echo $e . "\n";
}
?>
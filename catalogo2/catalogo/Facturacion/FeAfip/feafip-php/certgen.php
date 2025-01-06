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

// Generar una nueva pareja de clave privada (y p�blica)
$privkey = openssl_pkey_new();

// Generar una petici�n de firma de certificado
$csr = openssl_csr_new($dn, $privkey);

// Ahora querr� preservar su clave privada, CSR y certificado
// autofirmado por lo que pueden ser instalados en su servidor web, servidor de correo
// o cliente de correo (dependiendo del uso previsto para el certificado).
// Este ejemplo muestra c�mo obtener estas cosas con variables, pero
// tambi�n puede almacenarlas directamente en archivos.
// Normalmente, enviar� la CSR a su AC, la cu�l se la emitir� despu�s
// con el certificado "real".
openssl_csr_export($csr, $csrout) and var_dump($csrout);
openssl_pkey_export($privkey, $pkeyout, "") and var_dump($pkeyout);

// Mostrar cualquier error que ocurra
while (($e = openssl_error_string()) !== false) {
    echo $e . "\n";
}
?>
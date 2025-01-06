<?php

require("wsfe-class.php");

$nro = 0;
$PtoVta = 120;
$TipoComp = 1;
$FechaComp = date("Ymd");
$certificado = "certificado.crt";
$clave = "clave.key";
$cuit = 20939802593;
$urlwsaa = URLWSAA;

$wsfe = new WsFE();
$wsfe->CUIT = $cuit;
$wsfe->setURL(URLWSW);

if ($wsfe->Login($certificado, $clave, $urlwsaa)) {

            if (!$wsfe->RecuperaLastCMP($PtoVta, $TipoComp)) {
                echo $wsfe->ErrorDesc;
            } else {
                $wsfe->Reset();
                $nro = $wsfe->RespUltNro + 1;
                $wsfe->AgregaFactura(1, 80, 21111111113, $nro, $nro, $FechaComp, 12135.0, 0.0, 10000.0, 0.0, "", "", "", "PES", 1);
                $wsfe->AgregaIVA(5, 10000, 2100);
                $wsfe->AgregaTributo(2, "Perc IIBB", 1000, 3.5, 35);
                try {
                    if ($wsfe->Autorizar($PtoVta, $TipoComp)) {
                        echo "Felicitaciones! Si ve este mensaje instalo correctamente FEAFIP. CAE y Vencimiento :" . $wsfe->RespCAE . " " . $wsfe->RespVencimiento;
                    } else {
                        echo $wsfe->ErrorDesc;
                    }
                } catch (Exception $e){

                    if ($wsfe->CmpConsultar($TipoComp, $PtoVta, $nro, $cbte)){
                        echo "Felicitaciones! Si ve este mensaje instalo correctamente FEAFIP. CAE y Vencimiento :" . $cbte->CodAutorizacion . " " . $cbte->FchVto;
                    } else {
                        //cii
                    }
        }
    }
} else {
    echo $wsfe->ErrorDesc;
}

?>
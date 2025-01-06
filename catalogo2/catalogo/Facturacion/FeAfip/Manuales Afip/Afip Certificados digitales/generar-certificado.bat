openssl genrsa -out privada21.key 2048
openssl req -new -key privada21.key -subj "/C=AR/O=SFREDDO ROBERTO HORACIO/CN=subj_cn/serialNumber=CUIT 20176501783" -out pedido.csr
pause

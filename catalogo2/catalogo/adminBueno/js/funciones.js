
function agregardatos(estado){

	cadena="estado="+estado;

	$.ayax({
		type:"POST",
		url:"pedidos/actualizarEstado.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tablaPedido').load('pedidos/tablaPedidos.php');
				alertify.success("Actualizado con éxito");
			}else{
				alertify.error("Fallo no se pudo actualizar");
			}
		}
	});
}
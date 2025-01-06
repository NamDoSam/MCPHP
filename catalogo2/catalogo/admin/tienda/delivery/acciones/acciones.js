// JavaScript Document
function enviar_datos(datos){
	d=datos.split('||');
	$('#idPedido').val(d[0]);
	$('#estado').val(d[1]);
	
	$('#cargar_estado').click(function(){
		actualiza_estado();
	});
}

function actualiza_estado(datos){
	/*d=datos.split("||");*/
	idPedido=$('#idPedido').val();
	estado=$('#estado').val();
	
	cadena= "idPedido="+idPedido+
			"&estado="+estado;
			
	$.ajax({
	type:'POST',
	url:"actualizaciones.php?atualiza=estado",
	data:cadena,
	auccess:function(r){
		if(r==1){
			$('#tabla').load('componentes/tabla.php');
		}else{
			alertify.error("Fallo del servidor:()");
		}
	}
	});
}


<?php 
require_once('menu/menu.php');
?>
<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.min.css">
<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
<!--<script src="js/jquery-3.5.1.js"></script>-->
<script src="js/funciones.js"></script>
<script src="js/alertifyjs/alertify.js"></script>
<script>
   /* $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip(); 
    });*/
</script>   
<title>Consola de Pedidos</title>

</head>

<body>
<div class="container">
	<div id="tablaPedido"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="editarEstado" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Cambiar Estado del Pedido</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal">
            <fieldset>
            
            <!-- Select Basic -->
            <div class="form-group">
              <label class="col-md-4 control-label" for="selectbasic">Selector de Estado</label>
              <div class="col-md-4">
                <select id="estado" name="selectbasic" class="form-control">
                  <option value="Pedido">Pedido</option>
                  <option value="Entregado">Entregado</option>
                  <option value="Enviado">Enviado</option>
                  <option value="Retirado">Retirado</option>
                </select>
              </div>
            </div>
            </fieldset>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="cambiarestado">Cambiar Estado</button>
      </div>
    </div>
  </div>
</div>

<script>
	$(document).ready(function(){
		$('#tablaPedido').load('pedidos/tablaPedidos.php');
	});
</script>

<script>
  $(document).ready(function(){
    $('#cambiarestado').click(function(){
      estado=$('#estado').val();
      agregardatos(estado);
    });
  });
</script>
</body>
</html>

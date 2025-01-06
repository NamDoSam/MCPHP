<?php 
//https://www.jose-aguilar.com/blog/ordenar-elementos-con-jquery-sortable-ajax/
include_once("../../conexion/conexion.php"); ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Sortable - Default functionality</title>
<link href="css/styles.css" rel="stylesheet">
<link href="css/jquery-ui-1.10.4.custom.css" rel="stylesheet">
<script src="css/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.js"></script>

 <script type="text/javascript">
$(document).ready(function(){
    $('#cities').sortable({
        revert: true,
        opacity: 0.6, 
        cursor: 'move',
        update: function() {
            var order = $('#cities').sortable("serialize")+'&action=orderState';
            $.post("ajax.php", order, function(theResponse){
                $('#success').html('Gracias por ordenar las ciudades!').slideDown('slow').delay(1000).slideUp('slow');
            });
        }
    });
});
</script> 
</head>
<body>
<div id="success" style="display:none;"></div> 
<ul id="cities" class="sortable">
    <?php
    $query_cities = $mysqli->query('SELECT * FROM items ORDER BY orden');
    if ($query_cities->num_rows > 0) {
        while ($row = $query_cities->fetch_assoc()) {?>
			<li class="ui-state-default" id="city_<?php echo $row['idItem']?>">
			<table class="table">
				<thead>
				  <tbody>
					<tr>
					  <th scope="row">1</th>
					  <td><?php echo $row['item']?></td>
					  <td>Otto</td>
					  <td>@mdo</td>
					</tr>
				  </tbody>
				</table>
			</li>
    <?php    }
    }
    ?>
</ul>
</body>
</html>
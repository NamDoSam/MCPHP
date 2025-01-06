<link rel="stylesheet" href="selectInicio/css/estilos.css">
    
<div class="contenedor">
		<form action="">
			<div class="selectbox">
				<div class="select" id="select">
					<div class="contenido-select">
						<h1 class="titulo"><?php echo OPCIONES ?></h1>
						<!--<p class="descripcion">Lorem ipsum dolor sit.</p>-->
					</div>
					<!--<i class="fas fa-angle-down"></i>-->
                    <img src="img/iconos/v.png" width="22">
				</div>

				<div class="opciones" id="opciones">
                
<?php
$rub = "SELECT * FROM rubros  WHERE idCliente = '".$idCliente."' AND estado=0 AND ocultar=0 ORDER BY orden";
$rubro = $mysqli->query($rub);
while($rowR = $rubro->fetch_assoc()){
	echo "<h1 class='item'>".$rowR['item']."</h1>";
$cat = "SELECT * FROM categorias  WHERE idItem = '".$rowR['idItem']."' AND estado=0 AND ocultar=0 ORDER BY ordenCat";
$resulta = $mysqli->query($cat);
while($row = $resulta->fetch_assoc()){?>
					<a href="productos.php?c=<?php echo $slug ?>&idCat=<?php echo $row['idCat'] ?>&tituloProducto=<?php echo $row['categoria'] ?>">
						<div class="contenido-opcion">
							<!--<img src="img/mexico.png" alt="">-->
							<div class="textos">
								<div class="opcion">
               <h1 class="subtitulo"><font color="#FF3300" size="5">•</font> <?php echo $row['categoria'] ?></h1></div>
								</div>
							</div>
					</a>
				<?php  }}?>	
				</div>
			</div>

			<input type="hidden" name="pais" id="inputSelect" value="">
		</form>

	</div>

	<script src="selectInicio/js/main.js"></script>
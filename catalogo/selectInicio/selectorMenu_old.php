<!--<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&display=swap" rel="stylesheet"> 
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>-->
	<link rel="stylesheet" href="selectInicio/css/estilos.css">
    
<div class="contenedor">
		<form action="">
			<div class="selectbox">
				<div class="select" id="select">
					<div class="contenido-select">
						<h1 class="titulo">Opciones</h1>
						<!--<p class="descripcion">Lorem ipsum dolor sit.</p>-->
					</div>
					<!--<i class="fas fa-angle-down"></i>-->
                    <img src="img/iconos/v.png" width="22">
				</div>

				<div class="opciones" id="opciones">
                
<?php
$cat = "SELECT idCat,categoria,item FROM rubros INNER JOIN categorias ON rubros.idItem = categorias.idItem 
WHERE rubros.idCliente = '".NUM_CLIENTE."' AND categorias.estado=0 AND categorias.ocultar=0 ORDER BY ordenCat";

$resulta = $mysqli->query($cat);
while($row = $resulta->fetch_assoc()){?>
					<a href="productos.php?c=<?php echo SLUG ?>&idCat=<?php echo $row['idCat'] ?>&tituloProducto=<?php echo $row['categoria'] ?>">
						<div class="contenido-opcion">
							<!--<img src="img/mexico.png" alt="">-->
							<div class="textos">
								<div class="opcion">
                                <h1 class="subtitulo"><font color="#FF3300" size="5">•</font> <?php echo $row['categoria'] ?></h1></div>
							</div>
						</div>
					</a>
				<?php  }?>	
				</div>
			</div>

			<input type="hidden" name="pais" id="inputSelect" value="">
		</form>

	</div>

	<script src="selectInicio/js/main.js"></script>
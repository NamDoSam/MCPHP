<?php
$url='../'; 
require($url.'template/cenefa.php');
require($url.'template/menu.php');
$caracteres = 50;
?>
<style>
.modal-content {
    background-color: #f1f1f1;
}
</style>
<link rel="stylesheet" href="popup/css/lightbox.min.css">
<div class="container">
    <h3>Auspiciantes</h3>
    <hr>

    <div align="center">
        <form class="form-inline">
            <!--<div class="form-group">
                <input type="text" class="form-control" id="filtrar" <?php echo $may ?> placeholder="Buscar...">
            </div>-->
            <div class="form-group">
                <a href="Formulario_esponsor.php?slug=<?php echo SLUG ?>&idEsponsor=0"><button type="button"
                        class="btn btn-warning">Nuevo Auspiciante</button></a>
            </div>

           <!-- <a style="cursor:pointer;" data-toggle="modal" data-target="#myModal">
                <img class="ImgVideo" title="Cómo cargar Auspiciantes" src="videoTuto.jpg" height="45px"></a>-->
        </form>
    </div>
<br>
    <div class="table-responsive">
        <table class="table table-hover" style="background-color: #fff">
            <thead>
                <tr>
                    <th>Orden N°</th>
                    <th>Imagen</th>
                    <th>Auspiciante</th>
                    <th>Fecha</th>
                    <th>Edit</th>
                    <th>Estado</th>
                    <th>Borrar</th>
                </tr>
            </thead>

            <tbody class="buscar">
                <?php 
$num=0;
$resultado = $mysqli->query("SELECT * FROM esponsor WHERE  idCliente='".NUM_CLIENTE."' ORDER BY orden");
while($row = $resultado->fetch_assoc()){
	$num++;
?>
                <tr>
                    <td align="center"><?php echo $row['orden']?></td>
                    <td><?php $nombre_fichero = "../../imgCliente/".SLUG."/promo/".$row['idEsponsor'].".jpg";
          if (file_exists($nombre_fichero)) {
			  $link='';  $target=''; 
		  if($row['link']!=''){ $link=$row['link']; $target="target='_blank'"; }else{ $link='#'; $target='';}?>
                        <div>
                            <a href="<?php echo $link ?>" <?php echo $target ?>>
                                <img height="50" src="<?php echo $nombre_fichero."?ver=".time() ?>"
                                    style=" border: 1px solid #000;" title="<?php echo $row['descripcion'] ?>" /></a>
                        </div>
                        <?php }else{?>
                        <img src="../imgCliente/00.jpg" height="50" />
                        <?php }?>
                    </td>

                    <td><?php echo $row['esponsor'] ?></td>

                    <td><?php echo date("d-m-Y",strtotime($row['fecha'])) ?></td>

                    <td align="center"><a
                            href="Formulario_esponsor.php?slug=<?php echo SLUG ?>&idEsponsor=<?php echo $row['idEsponsor'] ?>">
                            <font color='#3366CC'><i class='fa fa-edit fa-lg'></i></font>
                        </a></td>

                    <td align="center"><?php if($row['estado']==0){?>
                        <a
                            href="estado.php?slug=<?php echo SLUG ?>&estado=1&modulo=esponsor&idEsponsor=<?php echo $row['idEsponsor'] ?>">
                            <font color='#00CC00'><i class='fa fa-eye fa-lg'></i></font>
                        </a>
                        <?php }else{?>
                        <a
                            href="estado.php?slug=<?php echo SLUG ?>&estado=0&modulo=esponsor&idEsponsor=<?php echo $row['idEsponsor'] ?>">
                            <font color='#FF0000'><i class='fa fa-eye fa-lg'></i></font>
                        </a>
                        <?php }?>

                    <td align="center">
                        <a onclick="return confirmar()"
                            href="borrarRegistros.php?slug=<?php echo SLUG ?>&idEsponsor=<?php echo $row['idEsponsor'] ?>&modulo=esponsor">
                            <font color="#FF0000"><i class='fa fa-trash fa-lg'></i></font>
                        </a>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <font size="30">&times;</font>
                </button>
                <h4 class="modal-title">Cómo cargar Auspiciantes</h4>
            </div>
            <div class="modal-body">
                <iframe class="myframe" width="100%" height="400" src="https://www.youtube.com/embed/5ydfLdXxWxc"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen></iframe>
            </div>
            <!--<div class="modal-footer">
        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>-->
    </div>

</div>
</div>
<br><br><br><br><br>
<script>
$('.ImgVideo').click(() => {
    $('.myframe').attr('src', 'https://www.youtube.com/embed/5ydfLdXxWxc');
});

$('.close').click(() => {
    $('.myframe').removeAttr('src');
});
</script>

<?php require($url.'template/footer.php'); ?>
<?php
$img="../".$_GET['imagen'];
unlink($img);
?>
<script>
	window.location="../presenciaWeb.php?slug=<?php echo $_GET['slug']?>";
</script>
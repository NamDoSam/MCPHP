<?php 
$url='../../';
require($url."template/cenefa.php");
require_once($url."template/menu.php");
$volver=$url."menuFormaPedido?c=".$slug;
?>
<style type="text/css">
.Rent {
  /*width: 180px;*/
  /*width: 80%;*/
}
.input {
  border: 1px solid #ccc;
  border-radius: 3px;
  box-shadow: 0 2px 2px 0 rgba(0,0,0,.06) inset;
  color: #555;
  font-size: 24px;
  padding: 8px;
  text-align: center
}
.inputMesa {
  width: 100px;
}
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }
</style>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4">
      <form name="form1" method="post" action="../cargarPedido.php?c=<?php echo $slug ?>&envio=MESA&idCliente=<?php echo $idCliente ?>&vendedor=<?php echo $_GET['vendedor'] ?>">
        <div align="center"> <?php echo MESA ?>
          <input type="number" name="mesa" class="form-control input inputMesa" placeholder="0" value="<?php echo $_SESSION['sesiones'][4] ?>" required>
          <br>
          <button type="submit" class="btn btn-success"><?php echo CARGAR_MESA ?> >></button>
        </div>
      </form>
    </div>
    <div class="col-sm-4"></div>
  </div>
</div>
<?php require_once($url."template/footer.php");?>
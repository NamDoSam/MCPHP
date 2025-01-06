<!-- Masthead-->
<style>
.input-group .bootstrap-select.form-control .dropdown-toggle {
    border-radius: inherit;
    background-color: #ffffff;
}
</style>

<header class="masthead">
  <div class="container">
    <div align="center">
      <div class="col-10 col-m-6 col-lg-6">
        <form name="form1" method="get" action="catalogo.php" >
			
         <select name="cat" id="first-disabled" class="selectpicker form-control buscador"
            data-hide-disabled="true" data-live-search="true" onchange="this.form.submit()" >
            <optgroup disabled="disabled" label="disabled">
            <option>Hidden</option>
            </optgroup>
            <option value="" selected>Buscar...</option>
	<?php  
	$p=$mysqli->query("SELECT idCat,categoria FROM item_categorias WHERE estado=0 ORDER BY categoria");
	while($cat = $p->fetch_assoc()){?>
             <option value="<?php echo $cat['categoria']."*".$cat['idCat']?>" 
					 <?php if($cat['idCat']==$_POST['cat']) echo "selected"; ?>><?php echo $cat['categoria']?></option>
    <?php }?>
	  
		  
          </select>
        </form>
      </div>
    </div>
    <br>
 <?php //print_r($_POST['cat'])?>   
    <div class="masthead-subheading">Bienvenidos a MenúCatálogo</div>
    <div class="masthead-heading text-uppercase">tu catalogo on-line - autogestionable</div>

  <!-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>-->
  </div>
</header>
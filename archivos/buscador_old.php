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
        <form method="POST" action="" >
       <!-- <br>
        <div class="input-group">

                      <input type="text" class="form-control buscador" placeholder="Buscar...">
                      <div class="input-group-btn">
                        <button class="btn btn-warning buscador"  type="submit"><i style="color: orange;" class="fa fa-search fa-2x" aria-hidden="true"></i></button>
                      </div>
                    </div>
           data-size="3" -->
         <select name="cat" id="first-disabled" class="selectpicker form-control buscador"
            data-hide-disabled="true" data-live-search="true" onchange="this.form.submit()">
            <optgroup disabled="disabled" label="disabled">
            <option>Hidden</option>
            </optgroup>
	<?php  
	$p=$mysqli->query("SELECT idCat,categoria FROM item_categorias ORDER BY categoria");
	while($cat = $p->fetch_assoc()){
	?>		  
            <optgroup label="<?php echo $cat['categoria']?>">
           
				
	<?php
	  
	$po=$mysqli->query("SELECT * FROM clientes WHERE item='".$cat['idCat']."'");
	while($row = $po->fetch_assoc()){
	?>
            <!--<option><?php echo $row['rubro']?></option>-->
             <option value="<?php echo $row['rubro']?>" <?php if($row['rubro']==$_POST['cat']) echo "selected"; ?>><?php echo $row['rubro']?></option>
    <?php }?>
				
            </optgroup>
	<?php }?>		  
			  
          </select>
        </form>
      </div>
    </div>
    <br>
 <?php print_r($_POST['cat'])?>   
    <div class="masthead-subheading">Bienvenidos a MenúCatálogo</div>
    <div class="masthead-heading text-uppercase">tu catalogo on-line - autogestionable</div>

  <!-- <a class="btn btn-primary btn-xl text-uppercase" href="#services">Tell Me More</a>-->
  </div>
</header>
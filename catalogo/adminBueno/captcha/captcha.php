<!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog ">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Recuperar contraseña</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="captcha/formCaptcha.php">
			  <br>
        <div class="form-group" align="center">
          <label for="email">Ingrese su Email:</label>
          <input type="hidden" name="cliente" class="form-control" id="email" value="<?php echo $_GET['c']?>" required>
          <input type="email" name="email" style="width:300px" class="form-control" id="email" required>
        </div>
        <br>
        <button type="submit" class="btn btn-info btn-sm float-right">Enviar</button><div class="modal-footer">
        </div>
      </form>
        </div>
      </div>
    </div>
  </div>
<!-- Fin Modal -->
<style>
footer {
    position: fixed;
    /*height: 100px;*/
    background-color:#333333;
    bottom: 0;
    width: 100%;
}
.main-footer {
    background-color: #000;
    border-top: 1px solid #CCC;
    color: #fff;
    padding: 1rem;
}
</style>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">

    <div class="row">
        <div class="col-6">
        <?php if ($volver) {?>
            <a style="color:#FFF" href="<?php echo $volver ?>"><i class="far fa-arrow-alt-circle-left fa-2x"></i> </a>
         <?php } else {echo "Sistema Gestión Catálogo";}?>
        </div>

        <div class="col-6" align="right">
            <a style="color:#FFF" href="<?php echo $url ?>conexion/salir.php"><i class="fas fa-sign-out-alt fa-2x"></i></a>
        </div>
    </div>

</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery-->
<script src="<?php echo $url ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo $url ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo $url ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo $url ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?php echo $url ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?php echo $url ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo $url ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo $url ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<!--<script src="<?php echo $url ?>plugins/moment/moment.min.js"></script>
<script src="<?php echo $url ?>plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo $url ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?php echo $url ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo $url ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $url ?>dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo $url ?>dist/js/demo.js"></script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
    <script src="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/js/moment.min.js"></script>
    <script src="https://www.jose-aguilar.com/scripts/css/bootstrap/range-datepicker/js/daterangepicker.js"></script>
    
<script>
$('#picker').daterangepicker({
	autoApply: true,
	startDate:'05-10-2020',
	endDate:'06-10-2020'
});
</script>

<!-- AdminLTE dashboard demo (This is only for demo purposes)
<script src="<?php echo $url ?>dist/js/pages/dashboard.js"></script>-->
</body>

</html>
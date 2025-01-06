
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
<style>
.btn-circle.btn-xl {
    width: 70px;
    height: 70px;
    padding: 10px 16px;
    border-radius: 35px;
    font-size: 24px;
    line-height: 1.33;
}

.btn-circle {
    width: 50px;
    height: 50px;
    padding: 6px 0px;
    border-radius: 25px;
    text-align: center;
    font-size: 25px;
    line-height: 1.42857;
}
.cont{
	max-width: 85%;
	margin: 0 auto;
	margin-top: 20px;
}
h6{
	font-size: 10px;
	margin-top: 5px;
    margin-bottom: 0.5rem;
}
</style>


<div class="cont" align="center">
	<div class="logo-slider">
<?php 
$host= "http://".$_SERVER["HTTP_HOST"].$url= $_SERVER["REQUEST_URI"];
$sel="SELECT * FROM categorias WHERE estado=0";
$m=$mysqli->query($sel);
while($row = $m->fetch_assoc()){
	
?>    
		<div class="item">
			<a href="<?php echo $host.$row['slug']  ?>"><button type="button" class="btn btn-primary btn-circle">
            <i class="fas fa-<?php echo $row['icono'] ?>"></i></button></a>
			<h6><?php echo $row['categoria'] ?></h6>
		</div>
<?php }?>        
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script>
	$('.logo-slider').slick({
		slidesToShow: 5,
		slidesToScroll: 1,
		dots: false,
		arrows: true,
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true
	});
</script>

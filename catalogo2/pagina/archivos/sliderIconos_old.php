
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
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-laptop"></i></button></a>
			<h6>Electrónica</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-suitcase"></i></button></a>
			<h6>Viajes</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-car"></i></button></a>
			<h6>Vehículos</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fa fa-bicycle"></i></button></a>
            <h6>Ciclismo</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-utensils"></i></button></a>
            <h6>Restaurantes</h6>
		</div>
        <div class="item">
            <a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-baby-carriage"></i></button></a>
            <h6>Bebés</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-tshirt"></i></button></a>
            <h6>Vestimenta</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-running"></i></button></a>
            <h6>Deportes</h6>
		</div>
		<div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-couch"></i></button></a>
            <h6>Muebles</h6>
		</div>
        <div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-hand-holding-medical"></i></button></a>
            <h6>Medicina</h6>
		</div>
       <div class="item">
			<a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-baby-carriage"></i></button></a>
            <h6>Bebés</h6>
        </div>
        <div class="item">
            <a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-store"></i></button></a>
            <h6>Mercados</h6>
        </div>
        
        <div class="item">
            <a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-th"></i></button></a>
            <h6>Varios</h6>
		</div>
        <div class="item">
            <a href="#"><button type="button" class="btn btn-primary btn-circle"><i class="fas fa-wrench"></i></button></a>
            <h6>Servicios</h6>
		</div>
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

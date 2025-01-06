<style>
.large {
    color: #fff !important;
    background-color: #EEFCFD !important;
    font-size: 1.2rem !important;
}

.bootstrap-select>.dropdown-toggle.bs-placeholder,
.bootstrap-select>.dropdown-toggle.bs-placeholder:hover,
.bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
.bootstrap-select>.dropdown-toggle.bs-placeholder:active {
    color: #fff !important;
}

.container {
    max-width: 250px;
    margin: 2rem auto;
}

.spinner * {
    text-align: center;
}

.spinner input::-webkit-outer-spin-button,
.spinner input::-webkit-inner-spin-button {
    margin: 0;
    -webkit-appearance: none;
}

.spinner input:disabled {
    background-color: white;
}

.input {
    height: 3rem;
    width: 20% !important;
    font-size: 2rem !important;
    margin: 0 0 30px 0 !important;
    padding: 0;
}

.btn-floating.btn-large {
    width: 46px;
    height: 46px;
}

.btn-large {
    height: 54px;
    line-height: 0px;
    font-size: 2.5rem;
}
</style>
<button type="button" class="btn btn-light">Light</button>
<div class="row">
    </ <div class="col m12">
    <?php for($j=1;$j<=3;$j++){?>

    <div class="card">
        <div class="slider">
            <ul class="slides">
                <li> <img src="productos/1773.jpg"> <!-- random image -->
                    <div class="caption center-align"></div>
                </li>
                <li> <img src="productos/1774.jpg"> <!-- random image -->
                    <div class="caption left-align"></div>
                </li>
                <li> <img src="productos/1779.jpg"> <!-- random image -->
                    <div class="caption right-align"></div>
                </li>
                </li>
            </ul>
        </div>
        <div class="card-content"> <span class="card-title activator grey-text text-darken-4">Card Title <i
                    style="font-size: 3rem; color:#00CCFF" class="material-icons right">remove_red_eye</i></span>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Id dignissimos, ducimus nisi in voluptate
                consectetur corrupti iure amet, placeat eius maxime exercitationem maiores perspiciatis sequi
                repellat eveniet iusto veritatis cumque!</p>
        </div>
        
        <div class="card-reveal"> <span class="card-title grey-text text-darken-4"><i
                    class="material-icons right">close</i>Card Title</span>
            <p>Here is some more information about this product that is only revealed once clicked on.</p>
            <ul class="collapsible" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                    <div class="collapsible-body"><span>Lorem ipsum dolor sit amet.</span></div>
                </li>
            </ul>

            <!-- ///////////////////////////////LISTADO/////////////////////////////-->
            <select id="country" name="country" class="form-control selectpicker form-control-sm large" title="Sabores"
                required multiple data-max-options="3">
                <?php for($i=1;$i<=50;$i++){?>
                <option value="<?php echo $i ?>">Option <?php echo $i ?></option>
                <?php }?>
            </select>

            <!-- ///////////////////////////////CANTIDAD/////////////////////////////-->
            <div class="container">
                <p align="center">Cantidad</p>
                <div class="input-group spinner">

                    <div class="input-group-prepend">
                        <button style="background-color:#0F0;"
                            class="btn-floating btn-large waves-effect waves-light minus" type="button">-</button>
                    </div>
                    <input type="number" name="nombre_<?php echo $i ?>" class="count form-control input" min="1"
                        max="1000" step="1" value="1">
                    <div class="input-group-append">
                        <button style="background-color:#FC0;"
                            class="btn-floating btn-large waves-effect waves-light plus" type="button">+</button>
                    </div>
                </div>
            </div>
            <!-- ///////////////////////////////fin CANTIDAD/////////////////////////////-->

            <button type="submit" class="btn btn-light">Light</button>
            <p></p>
        </div>
    </div>
    
</div></form>
<?php }?>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
$(document).ready(function() {
    min = 1; // Minimum of 0
    max = 100; // Maximum of 10
    $('.count').prop('disabled', true);
    $(".minus").on("click", function() {
        if ($('.count').val() > min) {
            $('.count').val(parseInt($('.count').val()) - 1);
            $('.counter').text(parseInt($('.counter').text()) - 1);
        }
    });
    $(".plus").on("click", function() {
        if ($('.count').val() < max) {
            $('.count').val(parseInt($('.count').val()) + 1);
            $('.counter').text(parseInt($('.counter').text()) + 1);
        }
    });
});
</script>
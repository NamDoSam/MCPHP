<?php
session_start();
require_once("template/cenefa.php");
//require_once("template/menu.php");
?>
<br><br><br>



<?php //require_once("producto.php");?>
<div class="container">
  <h2>Card Image</h2>
  <p>Image at the top (card-img-top):</p>
<div class="card" style="width:100%">
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

<div class="card-body">
      <h4 class="card-title">John Doe</h4>
      <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
      <a href="#" class="btn btn-primary">See Profile</a>
    </div>
  </div>
<?php require_once("template/footer.php");?>
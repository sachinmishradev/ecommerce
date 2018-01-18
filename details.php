<!DOCTYPE html>
<?php include("functions/functions.php"); ?>
<html>
<head>
<?php include("headincnav.php"); ?>
<style type="">
  #box-text{
  padding-left:3%;padding-bottom:5%;
}
#detailimage{height:400px;width:50%;}
#detailimage1{height:500px;width:60%;}

@media screen and (max-width: 700px) {
#box-text{
  text-align:right;
  padding-bottom:5%;font-size:16px;
        }
#detailimage{

    height:500px;width:50%;
        }
}

#carousel-example-generic {
  display: inline-block;
}
/*****************************/

/* Plugin styles */
ul.thumbnails-carousel {
  padding: 0px 0 0 0;
  margin: 0;
  list-style-type: none;
  text-align: center;
}
ul.thumbnails-carousel .center {
  display: inline-block;
}
ul.thumbnails-carousel li {
  margin-right: 5px;
  float: left;
  cursor: pointer;
}
.controls-background-reset {
  background: none !important;
}
.active-thumbnail {
  opacity: 0.4;
}
.indicators-fix {
  bottom: 70px;
}


</style>
<br><br><br><br><br> 
<?php include("cartinc.php"); ?>
<br><br><br> 
<div class="container-fluid" id="products">

<div id="product-box ">

<?php

if (isset($_REQUEST['pro_id'])){
   
 
$product_id = $_REQUEST['pro_id'];
 
  $product_id;
$get_pro = "select * from products where product_id={$product_id}";
  $run_pro = mysqli_query($con,$get_pro);
  while ($row_pro = mysqli_fetch_array($run_pro)) {
    
$pro_id  =  $row_pro['product_id'];
$pro_cat = $row_pro['product_cat'];
$pro_brnad = $row_pro['product_brand'];
$pro_title = $row_pro['product_title'];
$pro_price = $row_pro['product_price'];
$pro_image = $row_pro['product_image'];
$pro_desc = $row_pro['product_desc'];
$percent = ($pro_price * 70)/100;
$fake_price = $percent + $pro_price;
 
/***************select detail images ****************/
 
$select_images = mysqli_query($con,"SELECT * FROM details where main_image='$pro_image'");

$select_images_result = mysqli_fetch_array($select_images);
    $select_images_result['main_image'];
  $main_image = $select_images_result['main_image'];
  $image1  =  $select_images_result['image1'];
  $image2 =  $select_images_result['image2'];
  $image3 =  $select_images_result['image3'];
  $image4 =  $select_images_result['image4'];

/***************select detail images ****************/
/***************show detail images ****************/
?>

<!-- bootstrap carousel -->
<center>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active srle">
        <img src="product_images/<?php echo $image1; ?>"  style="height:350px;" alt="1.jpg" style='height:400px;' >
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="product_images/<?php echo $image2; ?>" style="height:350px;" alt="2.jpg" >
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="product_images/<?php echo $image3; ?>" style="height:350px;" alt="3.jpg" >
        <div class="carousel-caption">
          
        </div>
      </div>

      <div class="item">
        <img src="product_images/<?php echo $image4; ?>" style="height:350px;" alt="4.jpg" >
        <div class="carousel-caption">
          
        </div>
      </div>

    </div>

<br>
    <!-- Thumbnails --> 
    <ul class="thumbnails-carousel clearfix">
      <li><img src="product_images/<?php echo $image1; ?>" alt="1_tn.jpg" style="height:70px;"></li>
    <li><img src="product_images/<?php echo $image2; ?>" alt="1_tn.jpg" style="height:70px;"></li>
    <li><img src="product_images/<?php echo $image3; ?>" alt="1_tn.jpg" style="height:70px;"></li>
    <li><img src="product_images/<?php echo $image4; ?>" alt="1_tn.jpg" style="height:70px;"></li>
    </ul>


</center>

<?php 
/***************end of show detail images ****************/
echo 
"
<br>
<center>
<p class='card-text' id='cartclicks1' style='font-size:18px;'>
    <del>&nbsp;&#8377;$fake_price &nbsp;</del>&nbsp;&#8377;&nbsp;$pro_price &nbsp;<i>only </i>
</p>
</center>
<br> 
  <div class='row' style='text-align:left;' id='box-text'>
  
<br>
  <br>
  
  <h3 class='card-text' id='cartclicks1'>Price &nbsp;&#8377; $pro_price <i>only </i></h3>
  
 <h2 class='card-text' id='cartclicks2'><span  style='font-size:16px;'>product title  : </span>$pro_title</h2>
 <hr style='width:auto;height:1px;background-color:#95a5a6;'>

   <h2 class='card-text' id='cartclicks3' ><span >Description :</span>&nbsp; $pro_desc</h2>
    <hr style='width:auto;height:1px;background-color:#95a5a6;'>
   <form action='index.php' method='post'>


<input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>'  value='medium' />
  <label for='<?php echo $pro_id; ?>' class='btn btn-sm btn-danger' style='cursor:pointer'>M</label>
  <input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>1' value='large'  />
  <label for='<?php echo $pro_id; ?>1' style='cursor:pointer' class='btn btn-sm btn-danger'>L</label>
  <input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>2' value='xlarge' />
  <label for='<?php echo $pro_id; ?>2' style='cursor:pointer' class='btn btn-sm btn-danger'>XL</label>

 
 <select  class='select' style='padding:4px;border:2px solid ;border-radius:4px;color:#000;width:45px;padding:0px;padding-top:5px;padding-bottom:5px;cursor:pointer;' name='qty'>
<option value=1 >1</option>
 <option value=1>1</option>
<option value=2 >2</option>
<option value=3 >3</option>
<option value=4 >4</option>
<option value=5 >5</option>
<option value=6 >6</option>
<option value=7 >7</option>
<option value=8 >8</option>
<option value=9 >9</option>
<option value=10 >10</option>
<option value=11 >11</option>
<option value=12 >12</option>
<option value=13 >13</option>
<option value=14 >14</option>
<option value=15 >15</option>
</select>


  <input type='hidden' name='hid_pro_id' value='$pro_id'>
<br><br>
 <input   type='submit' style='width:200px;' value='Add to cart' name='sub' class='sub'>
  
</form> 
</div>
</div><br>
<hr>
<a href='index.php' class='btn btn-success'>Back to shop</a>
</div>


</div>



";
}
}
if (isset($_REQUEST['sub'])) {
  if (isset($_REQUEST['check'])) {
$_SESSION['check'] = $_REQUEST['check'];
}
if (isset($_REQUEST['qty'])) {
$_SESSION['qty'] = $_REQUEST['qty'];  
}
$_SESSION['pro']  =   $_REQUEST['hid_pro_id'];

}


if (isset($_REQUEST['sub'])) {

if (isset($_REQUEST['hid_pro_id'])) {
  $pro_id = $_REQUEST['hid_pro_id'];
}

if (isset($_REQUEST['qty'])) {
  $qty =  $_REQUEST['qty'];
}

if (isset($_REQUEST['check'])) {
  $siz = $_REQUEST['check'];
}




$ip = getIp();
  if(!isset($_REQUEST['check'])) {
    $siz = "medium";
  }
  if ($_REQUEST['qty'] == 0) {
    $qty = '1';
  }
  

      $insert_pro = "INSERT INTO cart SET p_id='$pro_id',ip_add='$ip',size='$siz',qty='$qty' ";
      $run_pro = mysqli_query($con,$insert_pro);
      if ($run_pro) {
       echo "<META http-equiv='refresh' content='0;all_products.php'>";
      }
  }


?>

</div>

</div>


<br><br><br><br><br>
<?php 

include("includes/footer.php");


?>
<script type="text/javascript">
 // thumbnails.carousel.js jQuery plugin
(function(window, $, undefined) {

  var conf = {
    center: true,
    backgroundControl: false
  };

  var cache = {
    $carouselContainer: $('.thumbnails-carousel').parent(),
    $thumbnailsLi: $('.thumbnails-carousel li'),
    $controls: $('.thumbnails-carousel').parent().find('.carousel-control')
  };

  function init() {
    cache.$carouselContainer.find('ol.carousel-indicators').addClass('indicators-fix');
    cache.$thumbnailsLi.first().addClass('active-thumbnail');

    if(!conf.backgroundControl) {
      cache.$carouselContainer.find('.carousel-control').addClass('controls-background-reset');
    }
    else {
      cache.$controls.height(cache.$carouselContainer.find('.carousel-inner').height());
    }

    if(conf.center) {
      cache.$thumbnailsLi.wrapAll("<div class='center clearfix'></div>");
    }
  }

  function refreshOpacities(domEl) {
    cache.$thumbnailsLi.removeClass('active-thumbnail');
    cache.$thumbnailsLi.eq($(domEl).index()).addClass('active-thumbnail');
  } 

  function bindUiActions() {
    cache.$carouselContainer.on('slide.bs.carousel', function(e) {
        refreshOpacities(e.relatedTarget);
    });

    cache.$thumbnailsLi.click(function(){
      cache.$carouselContainer.carousel($(this).index());
    });
  }

  $.fn.thumbnailsCarousel = function(options) {
    conf = $.extend(conf, options);

    init();
    bindUiActions();

    return this;
  }

})(window, jQuery);

$('.thumbnails-carousel').thumbnailsCarousel();
</script>
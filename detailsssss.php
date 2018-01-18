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
  background-color:#efdcad;padding-bottom:5%;font-size:16px;
        }
#detailimage{

    height:500px;width:50%;
        }
}
@media screen and (max-width:390px) {
  
    #detailimage{
    height:300px;width:90%;
        }
      #detailimage1{
    height:300px;width:90%;
        }

}

</style>
<br><br><br><br><br> 
<?php include("cartinc.php"); ?>
<br><br><br> 
<div class="container " id="products">

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
echo 
"
<div class='row text-center'>
  <img class='card-img-top'  id='detailimage' style='box-shadow:1px 3px 4px  #BFBFBF' src='product_images/$pro_image'  alt='product image'>
  <img class='card-img-top'  id='detailimage1' style='box-shadow:1px 3px 4px  #BFBFBF' src='product_images/$pro_image'  alt='product image'>
</div>
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
<a href='index.php' class='btn btn-success'>Back to shop</a>
</div>
</div>
";}}
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
  $('#detailimage').mouseover(function(){
    $('#detailimage1').show();
    $(this).hide();
  });

   $('#detailimage1').mouseout(function(){
    $(this).hide();
    $('#detailimage').show();
  });
</script>
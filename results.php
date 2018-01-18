<!DOCTYPE html>
<?php @session_start(); ?>
<?php include("functions/functions.php"); ?>
<html>
<head>
<?php include("headincnav.php"); ?>
<br><br><br><br><br> 

<?php include('fixedcartforindexandresult.php'); ?>
</div>

<br>
<br>

<div class="container" id="products">

<?php  // getIp();  ?>
<div id="product-box">
<?php 
if (isset($_REQUEST['search'])) {
  $search_query = mysqli_real_escape_string($con,$_REQUEST['user_query']);


  
$get_pro = "select * from products where product_keywords like '%$search_query%' order by RAND() ";
  $run_pro = mysqli_query($con,$get_pro);
if (mysqli_num_rows($run_pro) >= 1) {
  

  while ($row_pro = mysqli_fetch_array($run_pro)) {
    
$pro_id  =  $row_pro['product_id'];
$pro_cat = $row_pro['product_cat'];
$pro_brnad = $row_pro['product_brand'];
$pro_title = $row_pro['product_title'];
$pro_price = $row_pro['product_price'];
$pro_image = $row_pro['product_image'];
$percent = ($pro_price * 70)/100;
$fake_price = $percent + $pro_price;

echo 
"<a href='details.php?pro_id=$pro_id' style='text-decoration:none;'>
<div id='single_product'  class='card col col-sm-4  col-xs-6 '>
<div id='cartb'>
    <img class='card-img-top' style='box-shadow:1px 3px 4px  #BFBFBF' src='product_images/$pro_image' height='220px' width='220px' alt='Card image cap'>
    <div class='card-block' >
     <p class='card-text' id='cartclicks1'>
    <del>&nbsp;&#8377;$fake_price &nbsp;</del>&nbsp;&#8377;&nbsp;$pro_price &nbsp;<i>only </i>
    </p>
      <p class='card-text' id='cartclicks2'>$pro_title</p>
      <br>
      <a href='details.php?pro_id=$pro_id' class='detbtn btn'>Details</a>
      <br><br>    
    <form action='index.php' method='post'>

<input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>'  value='medium' />
  <label for='<?php echo $pro_id; ?>' class='btn btn-sm btn-danger' style='cursor:pointer'>M</label>
  <input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>1' value='large'  />
  <label for='<?php echo $pro_id; ?>1' style='cursor:pointer' class='btn btn-sm btn-danger'>L</label>
  <input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>2' value='xlarge' />
  <label for='<?php echo $pro_id; ?>2' style='cursor:pointer' class='btn btn-sm btn-danger'>XL</label>

&nbsp;&nbsp;&nbsp;

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
 <br>
  <br>

 <input   type='submit' value='Add to cart' name='sub' class='sub'>
  
</form>
      
  </div>
</div>
<br>
<br>
<br>
</div>
</a>

";
}}

else{
  echo "<h1>no products found !</h1><br><br>";
}}


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
</div>

<?php 

include("includes/footer.php");


?>
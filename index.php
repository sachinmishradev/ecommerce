<!DOCTYPE html>
<?php @session_start(); ?>
<?php  
include("functions/functions.php"); ?>
<?php include("includes/db.php"); ?>
<html>
<head>

<?php include("headincnav.php"); ?>
<style type="text/css">

  #vidgif{
    height:400px;
    width:100%;
  }
.modall{
font-size:25px;
}

  @media screen and (max-width:658px){
.modall{
font-size:18px;
}
  }
  @media screen and (min-width:658px){

#vidgif{
    height:410px;
    width:40%;
  }

  }

</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<br><br><br><br><br> 
<?php include('fixedcartforindexandresult.php'); ?>
</div><br>

<!-- video  -->

<!-- video  -->


       <center>
    <!--   <img src="images/vidgif.gif"  id="vidgif">  -->
  <br>
  <br>
   <h3><input type="submit" name="get_a_call" value="Go Custom !" 
         data-toggle="modal" data-target="#myModal" style="color:#fff;
         background-color:rgba(207, 0, 15,9);border:0px;line-height:1;padding:12px;font-family:verdana;line-height:2;box-shadow:2px 2px 2px #4edEdad;" ><h3></center>

<div class="container">
 
<center>
<div class="container">
 
  <div class="modal fade" id="myModal" role="dialog" style="margin-top:200px;">
    <div class="modal-dialog">
    
      
      <div class="modal-content modall">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title modall" style="color:green" >We'll contact you soon</h1>
        </div>
        <div class="modal-body modall">
        <form action="index.php" method="post" class="form-group" style="width:200px;" enctype="multipart/form-data">
          <div class="form-group">
            
          <input type="tel" name="caller" maxlength="10"  minlength="10" class="form-control" placeholder="Mobile no">
          </div>

          <div>
             <input type="submit" value="Send" name="mob_submit" class="btn btn-danger form-control" >

          </div>
         
        </form>
        </div>
        <div class="modal-footer text-center">
          <?php

if (isset($_REQUEST['mob_submit']) and !empty($_REQUEST['caller'])) {

 

$callervar = $_REQUEST['caller'];
$headers = "sachinmishra199747@gmail.com";
$subject = "ORDER CALLER";
$message = $callervar;
$to = "lifeistyli@gmail.com";
$callermail = mail($to,$subject,$message,$headers);


if (true) {
  echo "<script>alert('Thanks for filling up the field we will catch you soon ');</script>";
}
else{
    echo "<script>alert('plz fill the fields properly ');</script>";
}
}

?>
<span class="modall" style="color:#e74c3c;">For bulk orders And Complete Custom T-shirts</span><br> 
<div class="col col-sm-12">
<img src="images/what.png" height="100px">  <span style="font-size:24px;color:#2ecc71;font-family;align:center"verdana;>(8285300742)</span>
      
</div>
        </div>
        
      </div>
      
    </div>
  </div>
  
</div>
</center>







<!--

modal actual code..............###########################################################################3333
##########################################################
#####################################
-->


<br>
<br>

<div class="container" id="products">

<?php   getIp();  ?>
<div id="product-box">

<?php 
function getProducts(){

global $con;
  if(!isset($_REQUEST['cat']))

{ 
  if (!isset($_REQUEST['brand'])) {
    
  
 
  $get_pro = "select * from products order by RAND() LIMIT 0,18";
  $run_pro = mysqli_query($con,$get_pro);

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
"

<a href='details.php?pro_id=$pro_id' style='text-decoration:none;'>
<div id='single_product'  class='card col col-sm-4  col-xs-6'>
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
<!--
<a class='btn btn-danger btn-xs' href='#'> M&nbsp;<input type='radio' value='medium' id='s' name='check' style='cursor:pointer' /></a>
       <a class='btn btn-danger btn-xs' href='#'> L&nbsp;<input type='radio' value='large'id='s' name='check' style='cursor:pointer'/></a>
       <a class='btn btn-danger btn-xs' href='#'>XL&nbsp;<input type='radio' value='xlarge'id='s' name='check' style='cursor:pointer'/></a>

-->

<input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>'  value='medium' />
  <label for='<?php echo $pro_id; ?>' class='btn btn-sm btn-danger' style='cursor:pointer'>M</label>
  <input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>1' value='large'  />
  <label for='<?php echo $pro_id; ?>1' style='cursor:pointer' class='btn btn-sm btn-danger'>L</label>
  <input type='radio' class='input' name='check' id='<?php echo $pro_id; ?>2' value='xlarge' />
  <label for='<?php echo $pro_id; ?>2' style='cursor:pointer' class='btn btn-sm btn-danger'>XL</label>

 &nbsp;&nbsp;&nbsp;
<select  class='select' style='padding:4px;border:2px solid ;border-radius:4px;color:#000;width:45px;padding:0px;padding-top:5px;padding-bottom:5px;cursor:pointer' name='qty'>
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



  <input type='hidden' name='hid_pro_id' value='$pro_id'><br>
  <br>
 <input   type='submit'   value='Add to cart' name='sub' class='sub'>
  
</form><br>
      
  </div></div><br><br><br></div>
</a>

";}}}

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
       echo "<META http-equiv='refresh' content='1;all_products.php'>";
      }

  }
}
?>

<!-- get cat pro function  -->
<?php 
function  getCatProducts(){
global $con;
if(isset($_REQUEST['cat']))
{ 
  $cat_id = $_REQUEST['cat'];
    
  
  
  $get_cat_pro = "select * from products where product_cat={$cat_id}";
  $run_cat_pro = mysqli_query($con,$get_cat_pro);
$count  = mysqli_num_rows($run_cat_pro);
if($count >= 1)
  while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
    
$pro_id  =  $row_cat_pro['product_id'];
$pro_cat = $row_cat_pro['product_cat'];
$pro_brnad = $row_cat_pro['product_brand'];
$pro_title = $row_cat_pro['product_title'];
$pro_price = $row_cat_pro['product_price'];
$pro_image = $row_cat_pro['product_image'];
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

<select  class='select' style='padding:4px;border:2px solid ;border-radius:4px;color:#000;width:40px;padding:0px;padding-top:5px;padding-bottom:5px;cursor:pointer' name='qty'>
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
 <input   type='submit'  value='Add to cart' name='sub' class='sub'>
  
</form><br>
      
  </div>
</div><br><br><br></div></a>

";
}
else
{
echo '<center><h2>There is no products in this category !</h2></center><br><br>';

}
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
}
?>



<!--end  get cat pro function  -->
<!--end  get brands pro function  -->
<?php 
function getBrandProducts(){
  global $con;
  if(isset($_REQUEST['brand']))
{ 
  $brand_id = $_REQUEST['brand'];
    
  

  $get_brand_pro = "select * from products where product_brand={$brand_id}";
  $run_brand_pro = mysqli_query($con,$get_brand_pro);
   $count  = mysqli_num_rows($run_brand_pro);
if($count >= 1)
  while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
    
$pro_id  =  $row_brand_pro['product_id'];
$pro_cat = $row_brand_pro['product_cat'];
$pro_brnad = $row_brand_pro['product_brand'];
$pro_title = $row_brand_pro['product_title'];
$pro_price = $row_brand_pro['product_price'];
$pro_image = $row_brand_pro['product_image'];
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

<select  class='select' style='padding:4px;border:2px solid ;border-radius:4px;color:#000;width:40px;padding:0px;padding-top:5px;padding-bottom:5px;cursor:pointer' name='qty'>
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
 <input   type='submit' value='Add to cart' name='sub' class='sub'>
  
</form>
  </div>
</div><br><br><br></div></a>

";
}
else
{
echo '<center><h2>There is no products in this Brand !</h2></center><br><br>';

}
}
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

<?php  getProducts(); ?>
<?php getCatProducts(); ?>
<?php getBrandProducts(); ?>
</div>

</div>
</div>

<?php 

include("includes/footer.php");


?>
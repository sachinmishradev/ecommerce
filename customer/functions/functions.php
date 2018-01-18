<?php 
@session_start();
$con = mysqli_connect("localhost","id2275758_root","userpassword","id2275758_ecommerce");
// getting ip addresses

 
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;
}

// create the shooping cart
function cart(){
global $con;

	if (isset($_REQUEST['add_cart'])) {
		$ip = getIp();
		$pro_id = $_REQUEST['add_cart'];
		$check_pro = "select * from cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_cheak = mysqli_query($con,$check_pro);
		if (mysqli_num_rows($run_cheak) >0) {
			echo "";
		}
		else{
			$insert_pro = "INSERT INTO cart SET p_id='$pro_id',ip_add='$ip'";
			$run_pro = mysqli_query($con,$insert_pro);
			echo "<META http-equiv='refresh' content='0;index.php'>";
		}
	}
}


//End cart


// getting the total items
function total_items(){
	  global  $con;
	if (isset($_REQUEST['add_cart'])) {
     
       $ip = getIp();
       $get_items = "select * from cart where ip_add='$ip'";
       $run_items = mysqli_query($con,$get_items);
       $count_items = mysqli_num_rows($run_items);
	}
	else 
	{

		 $ip = getIp();
       $get_items = "select * from cart where ip_add='$ip'";
       $run_items = mysqli_query($con,$get_items);
       $count_items = mysqli_num_rows($run_items);
	}
	if($count_items == 0)
	{
		echo 'Cart Empty';
		echo "<script>$('#fixedcart').hide()</script>";
	}
	else
	{
		echo 'Items '.$count_items;
	}

}




//ending getting the total items
// getting the total price
function total_price(){
	$total = 0;
	global $con;
	$ip = getIp();
	$sel_price  = "select * from cart where ip_add='$ip' ";
	$run_price = mysqli_query($con,$sel_price);
	while ($p_price = mysqli_fetch_array($run_price)) {
		$pro_id = $p_price['p_id'];
		$pro_price = "SELECT * FROM products where product_id='$pro_id'";
		$run_pro_price = mysqli_query($con,$pro_price);
		while ($pp_price = mysqli_fetch_array($run_pro_price)) {
			
			$product_price = array($pp_price['product_price']);
			$values = array_sum($product_price);
		$total += $values;
			
		}

	}
	echo $total;
}
// getting categories


function getCats(){
	global $con;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con,$get_cats);
	while ($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		echo "<li><a href='index.php?cat=$cat_id' class='s'>$cat_title</a></li>";
	}


}



// getting brands


function getBrands(){
	global $con;
	$get_brands = "select * from brands";
	$run_brands = mysqli_query($con,$get_brands);
	while ($row_brands = mysqli_fetch_array($run_brands)){
		$brand_id = $row_brands['brand_id'];
		$brand_title = $row_brands['brand_title'];
		echo "<li><a href='index.php?brand=$brand_id' class='s'>$brand_title</a></li>";
	}


}



// getting brands


function getPro(){
	if(!isset($_REQUEST['cat']))
{	
	if (!isset($_REQUEST['brand'])) {
		
	
	global $con;
	$get_pro = "select * from products order by RAND() LIMIT 0,18";
	$run_pro = mysqli_query($con,$get_pro);

	while ($row_pro = mysqli_fetch_array($run_pro)) {
		
$pro_id	 =	$row_pro['product_id'];
$pro_cat = $row_pro['product_cat'];
$pro_brnad = $row_pro['product_brand'];
$pro_title = $row_pro['product_title'];
$pro_price = $row_pro['product_price'];
$pro_image = $row_pro['product_image'];
$percent = ($pro_price * 70)/100;
$fake_price = $percent + $pro_price;

echo 
"<a href='details.php?pro_id=$pro_id' style='text-decoration:none;'>
<div id='single_product'  class='card col col-sm-4  col-xs-6'>
<div id='cartb'>
	  <img class='card-img-top' style='box-shadow:1px 3px 4px  #BFBFBF' src='product_images/$pro_image' height='180px' width='180px' alt='Card image cap'>
	  <div class='card-block' >
	   <p class='card-text' id='cartclicks1'>
	  <del>&nbsp;&#8377;$fake_price &nbsp;</del>&nbsp;&#8377;&nbsp;$pro_price &nbsp;<i>only </i>
	  </p>
	    <p class='card-text' id='cartclicks2'>$pro_title</p>
	    <br>
	    <a href='details.php?pro_id=$pro_id' class='btn ' style='background-color:white; color:black;box-shadow:1px 3px 3px'>Details</a>
	    <hr style='width:200px'>
	    <a href='index.php?add_cart=$pro_id' class='btn btn-warning'  style='margin-bottom:0;z-index: 9999;border: 0;;line-height: 1.42857143 !important; border-radius: 0;'>
	    <span class='glyphicon glyphicon-shopping-cart' style='color:#fff;font-size:18px;''>&nbsp;</span>Add to cart</a>
	    
  </div></div><br><br><br></div>
</a>

";
}}}}


?>


<?php 
function getCatPro(){
	if(isset($_REQUEST['cat']))
{	
	$cat_id = $_REQUEST['cat'];
		
	
	global $con;
	$get_cat_pro = "select * from products where product_cat={$cat_id}";
	$run_cat_pro = mysqli_query($con,$get_cat_pro);
$count  = mysqli_num_rows($run_cat_pro);
if($count >= 1)
	while ($row_cat_pro = mysqli_fetch_array($run_cat_pro)) {
		
$pro_id	 =	$row_cat_pro['product_id'];
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
	  <img class='card-img-top' style='box-shadow:1px 3px 4px  #BFBFBF' src='product_images/$pro_image' height='180px' width='180px' alt='Card image cap'>
	  <div class='card-block'>

	  <p class='card-text' id='cartclicks1'>
	  <del>&nbsp;&#8377;$fake_price &nbsp;</del>&nbsp;&#8377;&nbsp;$pro_price &nbsp;<i>only </i>
	  </p>

	    <p class='card-text' id='cartclicks2'>$pro_title</p>
	    <br>
	    <a href='details.php?pro_id=$pro_id' class='btn ' style='background-color:white; color:black;box-shadow:1px 3px 3px'>Details</a>
	    <hr style='width:200px'>
	    <a href='index.php?pro_id=$pro_id' class='btn btn-warning'  style='margin-bottom:0;z-index: 9999;border: 0;;line-height: 1.42857143 !important; border-radius: 0;'>
	    <span class='glyphicon glyphicon-shopping-cart' style='color:#fff;font-size:18px;''>&nbsp;</span>Add to cart</a>
	    
  </div>
</div><br><br><br></div></a>

";
}
else
{
echo '<center><h2>There is no products in this category !</h2></center><br><br>';

}
}}
?>



<?php 



function getBrandPro(){
	if(isset($_REQUEST['brand']))
{	
	$brand_id = $_REQUEST['brand'];
		
	
	global $con;
	$get_brand_pro = "select * from products where product_brand={$brand_id}";
	$run_brand_pro = mysqli_query($con,$get_brand_pro);
	 $count  = mysqli_num_rows($run_brand_pro);
if($count >= 1)
	while ($row_brand_pro = mysqli_fetch_array($run_brand_pro)) {
		
$pro_id	 =	$row_brand_pro['product_id'];
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
	  <img class='card-img-top' style='box-shadow:1px 3px 4px  #BFBFBF' src='product_images/$pro_image' height='180px' width='180px' alt='Card image cap'>
	  <div class='card-block'>
	 <p class='card-text' id='cartclicks1'>
	  <del>&nbsp;&#8377;$fake_price &nbsp;</del>&nbsp;&#8377;&nbsp;$pro_price &nbsp;<i>only </i>
	  </p>

	    <p class='card-text' id='cartclicks2'>$pro_title</p>
	    <br>
	    <a href='details.php?pro_id=$pro_id' class='btn ' style='background-color:white; color:black;box-shadow:1px 3px 3px'>Details</a>
	    <hr style='width:200px'>
	    <a href='index.php?pro_id=$pro_id' class='btn btn-warning'  style='margin-bottom:0;z-index: 9999;border: 0;;line-height: 1.42857143 !important; border-radius: 0;'>
	    <span class='glyphicon glyphicon-shopping-cart' style='color:#fff;font-size:18px;''>&nbsp;</span>Add to cart</a>
	    
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

?>
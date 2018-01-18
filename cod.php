<?php 
@session_start();



if(!isset($_REQUEST['paye_email'])) {
	echo "<META http-equiv='refresh' content='0;checkout.php'>";
}
else
{

if ($_REQUEST['paye_customer_id'] != $_SESSION['user_id'] || $_REQUEST['paye_email'] != $_SESSION['customer_email']) {
	echo "<META http-equiv='refresh' content='0;checkout.php'>";
}


else{

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="images/logo.jpg" type="image/gif" sizes="16x16">
	<title>Welcome on Lifeistyli Store</title>
  <meta charset="UTF-8">
  <meta name="custom web store" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="sachin mishra">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="https://use.fontawesome.com/fc3e85f604.js"></script>
 </head>
<body>
<nav class="navbar navbar navbar-fixed-top" id="navbartopmenu">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar I" style="background-color:#000"></span>
        <span class="icon-bar I"style="background-color:#000"></span>
        <span class="icon-bar I"style="background-color:#000"></span> 
      </button>
      <a class="navbar-brand" href="#">
	<img src="images/logo.jpg" style="" class="img img-circle"  style="padding-top:100px;" height="40px" width="40px" ></a>
     <a href="#" style="font-size:20px;font-weight:bolder;line-height:3;color:#796;">Lifeistyl!</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="customer/my_account.php">my Account</a></li>
        
     </ul>
      <ul class="nav navbar-nav navbar-right" style="margin-left:2%;padding-top:10px;margin-right:2%;">
<form action="results.php" method="get" class="form-inline" >
<div class="input-group">
<input  class="form-control" size="30" name='user_query' type="text"  placeholder="search" required/>
<div class="input-group-btn">
<input class="btn btn-danger"  size="40"  name="search"   type="submit" value="search"/>
</div>
</div>
</form>
  </ul>
    </div>
  </div>
</nav>
<br><br><br>
<div class="container">
<?php 
include("includes/db.php");
include("functions/functions.php");
$codemail = $_SESSION['customer_email'];
$codid = $_REQUEST['paye_customer_id'];
#selection of the customer name
$codProductSelect = "SELECT * FROM  customers where customer_email='$codemail' AND customer_id='$codid' ";
$codProductSelect_run =  mysqli_query($con,$codProductSelect);
$cod = mysqli_fetch_array($codProductSelect_run);
$cod_customer_name = $cod['customer_name'];
/*
selection of the customer's detail
*/
$ip = getIp();
echo '<form action="" method="post"> ';
echo '<div class="jumbotron" style="background-color:#fff;">'; 
$street =  strtoupper($cod['customer_street']);
$landmark =  strtoupper($cod['customer_landmark']);
$state = strtoupper($cod['customer_city']);
$pincode =  strtoupper($cod['customer_pincode']);
$mis_address = strtoupper($cod['customer_address']);
$contact =  strtoupper($cod['customer_contact']);
$contact_no =  strtoupper($cod['customer_contact'])."<br>";
echo "<div class='cdcod' style='background-color:#fff;padding:20px;'>";
echo "<b style='font-family:verdana;'>Check your Shipping Address and contact details</b>.<br>";	
echo strtoupper($cod_customer_name)."<br>";
echo $street." ".$landmark." ".$state. " - ".$pincode;
echo "<br>".$mis_address.'<br>';
echo "<a class='btn btn-success' href='customer/my_account.php?edit_account' name='editadd' >Change or Add Address</a> <br>";
echo "<span style='font-size:18px;'>".$contact_no."</span>";
echo "</div>";
echo '</form>';
echo "<div class='row'>";
echo "<br>";
#selection of the products from cart
$codProductSelectPro = "SELECT * FROM  cart where ip_add='$ip' ";
$codProductSelect_runPro =  mysqli_query($con,$codProductSelectPro);
$totalPayable = 0;
$count  = mysqli_num_rows($codProductSelect_runPro);

while($codPro = mysqli_fetch_array($codProductSelect_runPro))
{
	
	$proid = $codPro['p_id'];
	$selproduct_query = mysqli_query($con,"SELECT * FROM products where product_id='$proid'");
	while($probyid = mysqli_fetch_array($selproduct_query))
	{
	 $title  = strtoupper($probyid['product_title']);
	 $priceforoneItem = $probyid['product_price'];
	 $priceforoneItemMulByQty = $priceforoneItem * $codPro['qty'];
	 $qt = $codPro['qty'];
	 $percent = ($priceforoneItemMulByQty * 70)/100;
	 $fake_price = $percent + $priceforoneItemMulByQty;
	 $totalPayable = $totalPayable+$priceforoneItemMulByQty;
/*
selection of the cart products detail
*/
?>

<?php
echo "<div class='col col-sm-6  col-xs-12' id='codmaindiv'>";
echo "<div class='col col-sm-8 col-xs-6 col-sm-push-2'  id='coddetail'>";
echo $title." T-shirt"."<br>"; ?>
seller : Lifeistyl!<br>
<?php  echo $codPro['size'].""."<br>"; ?>
<?php  echo "&#8377;".$priceforoneItemMulByQty." <del>".$fake_price."</del> <br>" ;	 ?>
</div>
<div class="col col-sm-4 col-xs-4">
<img src="product_images/<?php echo $probyid['product_image']; ?>"  height="100px" width="100px"/>
<br>
Qty : <?php echo $codPro['qty']."<br><br>"; ?>
</div>
</div>

<?php  
} }
$finalverify = $_REQUEST['paye_email'];
echo "</div><br><br>";
 echo "<b>PRICE DETAILS</b><hr>";
 echo "<span style='font-size:18px'>Price (".$count." items) : &#8377;<b>".$totalPayable."<b></span>";
 ?>



<form action="codverify.php" name="dilivery">
 <div class="jumbotron row text-center" style="background-color:#fff">
 <b>CHOSE A DILIVERY OPTION</b> 
 <br>
<div class="col col-sm-6">

		
		<DIV class="col col-sm-6 col-sm-push-3" style="background-color:#fff;color:#000;padding:30px;margin-bottom:10px;">
		<b><h3>Can't Wait ?</h3></b>
		<br>
			<span  style="font-family:verdana;">Dilivery width in 24 hours charges you &#8377;99 
			Check this field to have chossen products at your door within just 24 hours 
			</span><br>
			<div class="row">
			<div class="col col-sm-2 col-xs-2"> 
			<input type="radio"  name="24hours"  style="width:50px;cursor:pointer" class="form-control" value="24hours" required></div><div class="col col-sm-10 col-xs-10" style="font-size:30px;">&#8377; 99</div>
		</div></DIV>
</div>
<div class="col col-sm-6 ">
		
	<DIV class="col col-sm-6 col-sm-push-3 " style="background-color:#fff;color:#000;padding:30px;">
			<b><h3>Can Wait ?</h3></b>
		<br>
			<span  style="font-family:verdana;">Dilivery width in 4 to 5 working days hours charges you &#8377;0
			Check this field to have chossen products at your door within just 4 to 5 days! 
			</span><br>
			<div class="row">
			<div class="col col-sm-2 col-xs-2">
			 <input type="radio"  name="24hours"  style="width:50px;cursor:pointer" class="form-control" value="4to5wds" required>
			</div>
			<div class="col col-sm-10 col-xs-10" style="font-size:30px;" >&#8377; 0</div>
			</div>
			<input type="hidden" name="netpayable" value="<?php $_SESSION['net'] = $totalPayable; echo $totalPayable; ?>">		
			<input type="hidden" name="codmail" value="<?php echo $codemail; ?>">	
			<input type="hidden" name="mail" value="<?php echo $finalverify; ?>">
			<input type="hidden" name="cust" value="<?php echo $codid; ?>">	
<input type="hidden" name="count" value="<?php  $_SESSION['count'] = $count;  echo $count; ?>">	
		</DIV>
</div>


	</diV>
	<hr>
	<div class="col col-sm-12 text-center">

		<input type="submit" value="continue" name="submit" class="btn btn-warning btn-lg">
	</div>
	</div>
	</form>
	</div>
	</div>
	



<?php  include("includes/footer.php"); ?>

<?php
}
 }
 ?>

 <?php 

if(isset($_REQUEST['submit']))
{

	echo $_REQUEST['24hours'];
}




 ?>
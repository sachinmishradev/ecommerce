<?php 


@session_start();

include("includes/db.php");
include("functions/functions.php");
$ip = getIp();
	$empty_cart_after_oPlaced_check = mysqli_query($con,"select * from cart where ip_add='$ip'");

$countCart  = mysqli_num_rows($empty_cart_after_oPlaced_check);
if($countCart  < 1)
	{
		echo 	"<META http-equiv='refresh' content='0;index.php'>";
	}
else
{






$Totalprice =  0;
$delivery = 0;
$count  = 0;


if (!isset($_REQUEST['codmail'])  || !isset($_REQUEST['netpayable']) || !isset($_REQUEST['cust']) || !isset($_REQUEST['count'])) {

			echo 	"<META http-equiv='refresh' content='0;index.php'>";

	
}
else
{


	if ($_REQUEST['codmail'] != $_SESSION['customer_email'] || $_SESSION['count'] != $_REQUEST['count'] || $_REQUEST['netpayable'] != $_SESSION['net'] || $_REQUEST['cust'] != $_SESSION['user_id']) {
			echo 	"<META http-equiv='refresh' content='0;index.php'>";
	}
	else
	{
			$count = $_REQUEST['count'];

		if ($_REQUEST['24hours'] == "24hours") 
		{
			$Totalprice = $_REQUEST['netpayable'] + 99;
		 	$Totalprice;
		 	$delivery = 99;
		}
		elseif($_REQUEST['24hours']== "4to5wds")
		{
			$Totalprice = $_REQUEST['netpayable'] + 0;
			$Totalprice;
			$delivery = 0;
		}
		else
		{
				echo 	"<META http-equiv='refresh' content='0;index.php'>";

		}

	}

}
 
$totitemprice = $Totalprice - $delivery;
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
<br><br><br><br><br><br><br>
<div class="container">
	<div class="row">
		<div class="col col-sm-6"> 
		<div class="card" style="width:23rem">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Price Details</li>
    <li class="list-group-item" >Price ( <?php echo $count."  items ) <b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &#8377;".$totitemprice; ?></b></span>      </li>
    <li class="list-group-item">Delivery for <?php echo $count; ?>  item <b>&nbsp;&nbsp;&nbsp;&nbsp; &#8377; <?php echo $delivery*$count; ?></b></li>
    <li class="list-group-item">Amount Payable &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&#8377;<?php echo $Totalprice; ?></li>
  </ul>
		</div>

		</div>
		<div class="col col-sm-6"> 
		<p style="font-family:verdana;">Enter the characters you see below</p>
		<div style="width:150px;padding:10px;padding-right:10px;">
			<h1 style="background-color:yellow;padding:10px;"><?php $r = "574489461950945919845945"; $rt =  rand(3,8946);  echo $rt;?></h1>

		</div>

<input type="hidden" name="hiname" id="hi" value="<?php echo $rt ?>">
<input type="hidden" name="hiname" id="delivery" value="<?php echo $delivery; ?>">

		&nbsp;&nbsp;<input type="text" name="verify" id="code" size="19"  placeholder="Enter the characters" required><BR><BR>

		&nbsp;&nbsp;<BUTTON type="submit"  id="confirmid"  name="confirm"  style="padding:10px;background-color:rgba(211, 84, 0,1.0);color:#fff;font-family:verdana;" class="btn btn" >CONFIRM ORDER</BUTTON>

		<div id="result"  style="font-weight:bolder;margin-left:10px;font-size:18px;margin-top:100px;"></div>
	<!-- Trigger the modal with a button -->

<script type="text/javascript">
	$(document).ready(function(){

		$("#confirmid").click(function(){
			var user_code = $("#code").val();
			var delivery = $("#delivery").val();
			var hicode = $("#hi").val();			
			$.post("verifycod.php",{code:user_code,hicode:hicode,delivery:delivery},function(data){
				$("#result").html(data);
			});
		});
	});

</script>

	</div>
</div>
<br><br><br><br><br><br><br>
</div>
</div>
<?php include("includes/footer.php");  


}
?>
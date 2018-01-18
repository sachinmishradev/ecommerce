<?php 
@session_start();
if (isset($_REQUEST['paye_customer_id']) AND isset($_REQUEST['payable_amount']) AND isset($_SESSION['customer_email'])){


 if($_SESSION['customer_email'] != $_REQUEST['paye_email'] || $_SESSION['user_id'] != $_REQUEST['paye_customer_id']){	
echo "<META http-equiv='refresh' content='0;customer/my_account.php'>";
}
else{
if(isset($_REQUEST['b'])){if ($_REQUEST['b'] == 1) {echo "<META http-equiv='refresh' content='0;my_account.php?rare=2'>";}}else{?>

<!DOCTYPE html>

<br>
<?php
if(isset($_REQUEST['paye_email'])){
$paye_customer_id = $_REQUEST['paye_customer_id'];
$paye_email = $_REQUEST['paye_email'];
$payeable_amount = $_REQUEST['payable_amount'];
}
?>
<html>
<head>

<?php include("headincnav.php"); ?>
<div class="row"	>
<div align="center" class="col col-sm-6 text-center" style="margin-top:4px;">
<a href="cod.php?paye_customer_id=<?php echo $paye_customer_id; ?>&paye_email=<?php echo $paye_email; ?>" ><h1><img src="images/images.jpg" style="border-radius:12%;box-shadow:2px 3px 4px" ></h1></a>
</div>
  


<div align="center" class="col col-sm-6 text-center" style="" >
<h1>PAy with paypal</h1>
  <a href="#" ><h1><img src="images/paypal.png" style="border-radius:12%;box-shadow:2px 3px 4px;width:200px;" disabled></h1></a>
</div>
</div>


<?php 
}}}
else{

	echo "<META http-equiv='refresh' content='0;cart.php'>";
}
?>
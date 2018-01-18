<?php 
date_default_timezone_set('Asia/Kolkata');
@session_start();
 $_REQUEST['code'];
 $_REQUEST['hicode'];
$deli = $_REQUEST['delivery'];

 include("includes/db.php");
 include("functions/functions.php");

if ($_REQUEST['code'] != $_REQUEST['hicode']) {
	

echo '<div class="alert alert-warning alert-dismissable">
  		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  		<strong>Warning!</strong> WRONG Try Again
	  </div>';
}
else{
	$ip = getIp();
echo 
'<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> ORDER HAS BEEN PLACED SUCCESSFULLY
</div>';
echo "<a href='#'> we are redirecting you to your account ! </a><br>";
echo "<a href='customer/my_account.php?my_orders'> click  details ! </a>";


	// order insert code !

	$orderCartSelect =  "SELECT * FROM cart where ip_add='$ip'";
	$orderCartSelect_run = mysqli_query($con,$orderCartSelect);
	while ($orderCartSelect_result = mysqli_fetch_array($orderCartSelect_run))
    {
    	$product_id = $orderCartSelect_result['p_id'];
		
    	$orderProductSelect =  "SELECT * FROM products where product_id='$product_id'";
		$orderProductSelect_run = mysqli_query($con,$orderProductSelect);
		while ($orderProductSelect_result = mysqli_fetch_array($orderProductSelect_run))
	    {

	    	$product_id = $orderCartSelect_result['p_id'];
			$product_size = $orderCartSelect_result['size'];
			$product_quantity = $orderCartSelect_result['qty'];
			$deli = $_REQUEST['delivery'];
			if ($deli == 99) {
				$product_price = $orderProductSelect_result['product_price']*$product_quantity+99;
				$delevery_type = "instant";
			}
			elseif ($deli == 0) {
				$product_price = $orderProductSelect_result['product_price']*$product_quantity+0;
				$delevery_type = "4 to 5 wds";
			}
				
	  			
			$customer_id = $_SESSION['user_id'];
			
			//$date = date('D-M-Y H:i');
			$invoice = mt_rand();
			$cod = "COD";
			$time = date("Y-m-d H:i:s A",time());
			$orderInsert  = "INSERT INTO orders SET p_id='$product_id',c_id='$customer_id',size='$product_size',
			qty='$product_quantity',amount='$product_price',Payment_mode='$cod',deltype='$delevery_type',order_date='$time',invoice_no='$invoice'";

		mysqli_query($con,$orderInsert);



		}
	}



mysqli_query($con,"DELETE FROM cart where ip_add='$ip'");





unset($_SESSION['net']);
unset($_SESSION['pro']);
unset($_SESSION['check']);


echo 	"<META http-equiv='refresh' content='3;customer/my_account.php?my_orders'>";

}

?>
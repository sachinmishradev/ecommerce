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
echo "<a href='#'> we are redirecting you to your account !  <h4>  check out your mail box </h4></a><br>";
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
			$title = $orderProductSelect_result['product_title'];
			
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

			//mail to the customer on order confirm!
			$mail_send_confrm = mysqli_query($con,"SELECT customer_email,customer_name from  customers where customer_id='$customer_id'"); 
			$select_details_for_email  =  mysqli_fetch_array($mail_send_confrm);

		 	$to = $select_details_for_email['customer_email'];
		 	$c_name = $select_details_for_email['customer_name'];
			
			$i = 1;
            $headers =  "MIME-Version: 1.0"."\r\n";
            $headers .=  "content-type:text/html;charset=UTF-8"."\r\n";
            $headers .= "From : <lifeistyli@gmail.com>"."\r\n";
            $subject  = "lifeistyli ORDER DETAILS";
           $message = "<html>

            <p style='font-size:15px;font-family:verdana;'>
            Hello dear <b style='color:blue'>$c_name</b> you have ordered  some products on our website LIFEISTYL!.STORE , plz find your details ,
            your order will be delevered shortly, Thank you</p>

            <table width='600'  bgcolor='#ffcc99' border='2 solid'>
            <tr><td colspan='5' style='text-align:center;'  ><h4>Your Order Details From www.lifeistyli.store </h2></td></tr>
            <tr>
            <td style='text-align:center;'><b>S-NO </b></td>
            <td colspan='1' style='text-align:center;'><b>Product name </b></td>
            <td style='text-align:center;'><b>Quantity</b></td>
            <td style='text-align:center;'><b>payable amount </b></td>
            <td style='text-align:center;'><b>invoice no</b></td>
            </tr>

            <tr>
            <td style='text-align:center;'><b>$i</b></td>
            <td style='text-align:center;'><b>$title</b></td>
            <td style='text-align:center;'><b>$product_quantity</b></td>
            <td style='text-align:center;'><b>$product_price</b></td>
            <td style='text-align:center;'><b>$invoice</b></td>
            </tr>
           </table>
           <h4>please go to your account and see your order details</h4>
           <h4><a href='http://sachinmishra199747.000webhostapp.com/customer/my_account.php?my_orders'>Click here</a> to login to your account</h4> 
<h4>Thank you for your order  @ - www.lifeistyli.store </h4>
  <p style='color:green;font-size:17px;'> FOR ANY QUERY HEAR IS OUR WHATSAPP NO : 8285300742</p>";
mail($to,$subject,$message,$headers);
		}
	}




mysqli_query($con,"DELETE FROM cart where ip_add='$ip'");

echo 	"<META http-equiv='refresh' content='3;customer/my_account.php?my_orders'>";

}

?>
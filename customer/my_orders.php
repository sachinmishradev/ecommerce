<style type="text/css">
	body {
  font-family: "Open Sans", sans-serif;
  line-height: 1.25;
}
table {
  border: 1px solid #ccc;
  border-collapse: collapse;
  margin-left:7px;

  padding: 0;
  width: 100%;
  table-layout: fixed;
}
table caption {
  font-size: 1.5em;
  margin: .5em 0 .75em;
}
table tr {
  background: #f8f8f8;
  border: 1px solid #ddd;
  padding: .35em;
}
table th,
table td {
  padding: .625em;
  text-align: center;
  font-size:0.9em;
}
table th {
  font-size: .85em;
  letter-spacing: .1em;
  text-transform: uppercase;
}
.hidonsm{display:none;font-weight:bolder;font-family:verdana;}
@media screen and (max-width: 600px) {
  table {
    border: 0;
  }
  .hidonsm{display:inline;font-weight:bolder;font-family:verdana;}
  table caption {
    font-size: 1.3em;
  }
  table thead {
    border: none;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
  }
  table tr {
    border-bottom: 3px solid #ddd;
    display: block;
    margin-bottom: .625em;
  }
  table td {
    border-bottom: 1px solid #ddd;
    display: block;
    font-size: .8em;
    text-align: left;
  }
  table td:before {
    /*
    * aria-label has no advantage, it won't be read inside a table
    content: attr(aria-label);
    */
    content: attr(data-label);
    float: left;
    font-weight: bold;
    text-transform: uppercase;
  }
  table td:last-child {
    border-bottom: 0;
  }
}
</style>
<table>
  <thead>
    <tr>
    <th scope="col">S.N</th>
		<th scope="col">Product (s)</th>
		<th scope="col">Quantity</th>
		<th scope="col">Invoice No</th>
		<th scope="col">Order Date</th>
		<th scope="col">Payment Mode</th>
		<th scope="col">Status</th>
    </tr>
  </thead>
  <tbody><br><br><br>
    <p><h2 style="color:green;font-family:verdana;font-size:18px;text-align:center;background-color:#edffcd;padding:20px;width:96%;margin-left:20px;">View  order details </h2></p>
	<br>
   <?php 
function formatDate($date){
	return date('Y D m-d',strtotime($date));
}
	include("includes/db.php");
	$email = $_SESSION['customer_email'];
	$auth_order = "SELECT customer_id FROM customers where customer_email='$email'";
	$auth_order_run  =   mysqli_query($con,$auth_order);
	$c = mysqli_fetch_array($auth_order_run);
	$co_id = $c['customer_id'];
	$get_order = "SELECT * FROM  orders where c_id='$co_id' ORDER BY order_id DESC";
	
	$run_order = mysqli_query($con, $get_order); 
	
	$i = 0;
	
	while ($row_order =mysqli_fetch_array($run_order)){
		$order_id = $row_order['order_id'];	
		$qty = $row_order['qty'];
		$pro__id = $row_order['p_id'];
		$invoice_no  = $row_order['invoice_no'];
		$order_date  = $row_order['order_date'];
		$status = $row_order['status'];
		$Payment_mode = $row_order['Payment_mode'];
		$amount = $row_order['amount'];
	
		$i++;
	$get_pro = "select * from  products where product_id='$pro__id' ";
	$run_pro = mysqli_query($con,$get_pro);
	$row_pro = mysqli_fetch_array($run_pro);
	$pro_image = $row_pro['product_image'];
	$pro_title = $row_pro['product_title'];

	

	?>
	<tr>
		<td ><span class='hidonsm'>S-no:</span><?php echo $i;?></td>
		<td ><?php echo $pro_title;?><br>
		<img style='margin-top:20px;' src="../product_images/<?php echo $pro_image; ?>" width="60px" height="60px">
		</td>
		<td>Qty: <?php echo $qty;?>
		<p style="font-family:verdana;font-size:12px;"><br>Inc.All(taxes - &#8377;<?php echo $amount;?>)</td>
		<td><span class='hidonsm'>Invoice no:</span><?php echo $invoice_no;?></td>
		<td ><span class='hidonsm'>Order date: </span><p style="font-size:12px;"><?php echo formatDate($order_date);?></p></td>
		<td><span class='hidonsm'>Payment-mode:</span><?php echo $Payment_mode;?></td>
		<td><h3 style="color:green;font-size:15px;"><?php echo $status;?></h3>
		<?php if ($status != 'Cancled') {?>
		<a  style='margin-top:30px;border:0px;' class="btn btn-sm btn-danger" href="my_account.php?cancle_order=<?php  echo $pro__id; ?>">cancle order</a>
		
	<?php	} ?>
		</td>

	
	</tr>

	<?php
	
	 } ?>
  </tbody>
</table></p></td></tr></tbody></table></style>
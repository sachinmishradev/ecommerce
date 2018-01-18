
<div class="text-center">
	<div>
		<h4>Do you really want to cancle your order</h4><br>
		<form class="form-geoup" action="" method="post">
			<textarea cols="5" class="form-control" rows="4" name="reason" placeholder="Give us a reason "></textarea>
		<br>
			<div class="form-group" id="button">
			<input class="btn btn-warning btn-lg  " style="padding:50px;margin-bottom:20px;margin-right:20px;border:0px;background:rgba(192, 57, 43,1.0)"  type="submit" name="yes" value="yes cancle order"/>
			<input class="btn btn-primary btn-lg"style="padding:50px;border:0px;margin-bottom:20px;margin-right:20px;background:rgba(46, 204, 113,1.0);" type="submit" name="no" value="No  don't cancle "/>
			
			</div>
			<div class="form-group">
			
				</div>
		</form>

	</div>
</div>

<?php 



$pro_cancle = $_REQUEST['cancle_order'];
$sel  = mysqli_query($con,"SELECT * from orders WHERE p_id='$pro_cancle'");
$count  = mysqli_num_rows($sel);
if($count >0 )
{


if (isset($_REQUEST['yes'])) {
	
		$reason = $_REQUEST['reason'];
		$status = "Cancled";
		$user = $_SESSION['user_id'];
		$upadte_cancle = "UPDATE orders SET status='$status' where p_id='$pro_cancle'";
		mysqli_query($con,$upadte_cancle);
		$inreason  =mysqli_query($con,"INSERT INTO reviews SET review='$reason',c_id='$user'");
		echo "<script>alert('Successfully cancled your order! ');</script>";
		echo "<META http-equiv='refresh' content='2;my_account.php?my_orders'>";
				
	}
elseif (isset($_REQUEST['no'])) {
	echo  "<META http-equiv='refresh' content='0;my_account.php?my_orders'>";
}
}
else
{
	echo  "<META http-equiv='refresh' content='0;my_account.php?my_orders'>";
}
?>



<form class="form-geoup" action="" method="post">
<h1>Do you really want to delete your account :( </h1><br>
<div class="form-group">
<input class="btn btn-danger btn-lg " type="submit" name="yes" value="Yes Delete My Account"/>
</div>
<div class="form-group">
<input class="btn btn-primary form-control" type="submit" name="no" value="No Don't delete"/>
</div>
</form>




<?php 

if (isset($_REQUEST['yes'])) {
 $user = $_SESSION['customer_email'];
	$Del = "delete from customers where customer_email='$user'";
	$del_run = mysqli_query($con,$Del);
	//	echo "<script>alert('Your account has deleted');</script>";
	if ($del_run) {
		session_destroy();
	 	echo "<script>alert('Your account has deleted');</script>";
	 	echo "<META http-equiv='refresh' content='0;../index.php'>";

	 } 
}

if(isset($_REQUEST['no']))
{


		echo "<script>alert('We are taking you to your account');</script>";
	 	echo "<META http-equiv='refresh' content='2;my_account.php'>";


}


?>
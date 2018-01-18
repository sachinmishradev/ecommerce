<?php
@session_start();
include("includes/db.php");
$user = $_SESSION['customer_email'];
$get_customer = "select * from customers where customer_email='$user'";
$run_customer = mysqli_query($con,$get_customer);
$row_customer = mysqli_fetch_array($run_customer);

$name = $row_customer['customer_name'];
$emaill = $row_customer['customer_email'];
$pass = $row_customer['customer_pass'];
$image = $row_customer['customer_image'];
#$countryy = $row_customer['customer_country'];
$city = $row_customer['customer_city'];
$contact = $row_customer['customer_contact'];
$c_street = $row_customer['customer_street'];
$c_landmark = $row_customer['customer_landmark'];
$c_pincode = $row_customer['customer_pincode'];
$address = $row_customer['customer_address'];
$c_id = $row_customer['customer_id'];



?>


<form method="post" action="" enctype="multipart/form-data" style="margin-left:20px;margin-right:20px;">
	      <h1 class="text-center" style="color:#000;">Edit your account</h1>
	      <br>
	     
	     	<b>Customer Name </b>: <input type="text" class="form-control" value="<?php  echo $name; ?>" name="c_name" required>
	      
	     
	     	<b>Customer Email </b>: <input type="email" class="form-control" value="<?php  echo $emaill; ?>" name="c_email" required>
	      
	     
	     <b>	Customer Password </b>: <input type="password" minlength="12" class="form-control"  value="<?php  echo $pass; ?>" name="c_pass" disabled>
	     
	     <img src="customer_images/<?php echo $image; ?>" width="50" height="50"/><br>
	     <b>Customer Image </b>: <input type="file" class="form-control"  name="c_image" >

	     	
	      
	     
	     	<b>Customer country </b>: 
	     	<select class="form-control" name="c_country"  disabled>
	     	<option value="99">india</option>
	     	<?php
	     	/*$country =  mysqli_query($con,"SELECT * FROM countries where id='$countryy'");  
	     	while ($country_result = mysqli_fetch_array($country))
	     	{ ?>
	     	<option value="<?php echo $country_result["id"]; ?>"><?php echo $country_result['country_name']; ?></option>
	     	<?php }
	     	*/?>
			</select> 	
	     
	     	<b>Customer City </b>: <input type="text" class="form-control"  value="<?php  echo $city; ?>" name="c_city" disabled>
	      	<b>Customer street/block </b>: <input type="text" class="form-control"  value="<?php  echo $c_street; ?>" name="c_street" required>
	       	<b>Customer Landmark </b>: <input type="text" class="form-control"  value="<?php  echo $c_landmark; ?>" name="c_landmark" required>
	        <b>Customer Pincode </b>: <input type="text" class="form-control"  value="<?php  echo $c_pincode; ?>" name="c_pincode" required>
	       	<b>Customer Contact</b>: <input type="tel" maxlength="10" minlength="10" class="form-control"  value="<?php  echo $contact; ?>" name="c_contact"required >
	
	     
	    <b> Customer Address</b>: <textarea class="form-control"  rows="4" cols="20"    name="c_address" required><?php  echo $address; ?></textarea>
 	     
 	     <br>
 	     
	     	<input type="submit" class="btn btn-primary form-control" name="register" value="create Account" >
	     
</div>
 </form>
 <br>
 </div>



</div>

 <br><br><br> <br><br><br>


<?php


$ip = getIp();
if (isset($_REQUEST['register'])) {
	$customer_id = $c_id;
	$c_emai = $_REQUEST['c_email'];
	$c_emaill = strtolower($c_emai);
	$ip = getIp();
	$c_name = mysqli_real_escape_string($con,$_REQUEST['c_name']);
	$c_country = $_REQUEST['c_country'];
	//$c_pass = $_REQUEST['c_pass'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	#$c_city = mysqli_real_escape_string($con,$_REQUEST['c_city']);
	$c_contact = mysqli_real_escape_string($con,$_REQUEST['c_contact']);
	$c_address = mysqli_real_escape_string($con,$_REQUEST['c_address']);
	$c_street = mysqli_real_escape_string($con,$_REQUEST['c_street']);
	$c_landmark = mysqli_real_escape_string($con,$_REQUEST['c_landmark']);
	$c_pincode = mysqli_real_escape_string($con,$_REQUEST['c_pincode']);


	move_uploaded_file($c_image_tmp,"customer_images/$c_image");
	if (empty($c_image)) {
		$c_image = $image;
	}
	
	$update_c  = "UPDATE  customers SET customer_name='$c_name',customer_email='$c_emaill',customer_pass='$pass',customer_city='$city',customer_contact='$c_contact',customer_street='$c_street',customer_landmark='$c_landmark',customer_pincode='$c_pincode',customer_address='$c_address',customer_image='$c_image' WHERE customer_id='$customer_id'";
		
	$run_update =  mysqli_query($con,$update_c);

	if ($run_update) {
		$_SESSION['customer_email']  = $c_emaill;
		echo "<script>alert('Updated successfully');</script>";
		echo "<META http-equiv='refresh' content='0;my_account.php'>";
	}
	}


?>
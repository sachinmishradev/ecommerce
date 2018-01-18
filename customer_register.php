<!DOCTYPE html>
<?php @session_start(); ?>
<?php include("functions/functions.php"); ?>
<html>
<head>
<?php include("headincnav.php"); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<br><br><br><br><br> 
<?php include("cartinc.php"); ?>
<div class="container thumbnail" id="products" style="background-color:rgba(189, 195, 199,.5);color:#000;padding:10px;border-radius:10px;font-family:arial;font-size:19px;">
<div class="col col-sm-6  col-sm-push-3">
<h1 class="text-center" style="color:#000;">Create an account</h1>
<form method="post" action="customer_register.php" enctype="multipart/form-data">
	      
	      <br>
	    
	   	Customer Name : <input type="text" class="form-control" name="c_name" required>
	    
	    Customer Email : <input type="emial"class="form-control" name="c_email" required>
	      
	     
	    Customer Password : <input type="password" minlength="12" class="form-control" name="c_pass" required>	     
	    Customer Image : <input type="file" class="form-control" name="c_image">
	     	Customer country : 
	     	<select class="form-control" name="c_country" disabled>
	     	<option value="india"> India </option>
	     	<?php
	     ?>
			</select> 	
	    
	      
	    Customer City : <input type="text" class="form-control" name="c_city" value="Delhi-Ncr"  disabled>
	     
	      
	    Customer Contact : <input type="tel" name="caller" maxlength="10"  minlength="10" class="form-control" placeholder="Mobile no"  name="c_contact"required>
         
 
	 
	    Street/Block :  <input type="text" class="form-control" name="c_street"  required>

	    Nearest Landmark :  <input type="text" class="form-control" name="c_landmark" required >
 	 	
 	 	Pin Code :  <input type="number" maxlength="12" class="form-control" name="c_pincode" required >
 	 
	    Customer Address : <textarea class="form-control"  name="c_address" required></textarea>
 	 
 	     <br>
 	     <div class="form-group">
	     	<input type="submit" class="btn btn-primary form-control" name="register" value="create Account" >
	     </div> 
</div>
 </form>
 <br>
 </div>



</div>

 <br><br><br> <br><br><br>

<!--
footer code

-->
<?php 
include("includes/footer.php");

?>

<!--
footer code

-->

<script type="text/javascript">
     $('#mainCarousel').carousel({
    interval: 10000 
});
</script>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<?php



if (isset($_REQUEST['register'])) {
	
	$c_emai = $_POST['c_email'];
	$c_email = strtolower($c_emai);
	$checkmail = mysqli_query($con,"SELECT * FROM customers WHERE customer_email='$c_email'");
	if(!mysqli_num_rows($checkmail) > 0 ){
	$ip = getIp();
	$c_name = mysqli_real_escape_string($con,$_REQUEST['c_name']);
	
	$c_pass = $_REQUEST['c_pass'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	# $c_country = mysqli_real_escape_string($con,$_REQUEST['c_country']);
	#$c_city = mysqli_real_escape_string($con,$_REQUEST['c_city']);
	$c_contact = mysqli_real_escape_string($con,$_REQUEST['c_contact']);
	$c_address = mysqli_real_escape_string($con,$_REQUEST['c_address']);
	$c_street = mysqli_real_escape_string($con,$_REQUEST['c_street']);
	$c_landmark = mysqli_real_escape_string($con,$_REQUEST['c_landmark']);
	$c_pincode = mysqli_real_escape_string($con,$_REQUEST['c_pincode']);
	$c_country = "99";
	$c_city = "Delhi-Ncr";

	$chimg  = move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
	$che = $c_name.$c_email;
	$token = md5($che).str_shuffle("3489asds");
	$rer = "jbkbl";
         if($c_image == '')
        {
           $c_image = "default.jpg";

        } 

	$insert_c  = "INSERT INTO customers SET customer_id='',customer_ip='$ip',customer_name='$c_name',customer_email='$c_email',customer_pass='$c_pass',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_street='$c_street',customer_landmark='$c_landmark',customer_pincode='$c_pincode',customer_address='$c_address',customer_image='$c_image',token='$token'";
		$to = $c_email;
			$subject = "verification Email";
			$message = "please click on the below link in order to activate your account ";
			$message .= '<a href="https://sachinmishra199747.000webhostapp.com/includes/activate.php?token='.$token.'">Click to activate</a>';
			$headers = "Form : sachinmishra199747@gmail.com\n";
			$headers .= "MIME-Version : 1.0\n";
			$headers .= "Content-type:text/html;charset=iso-8859-1\n";

			mail($to, $subject, $message,$headers);
 
	
	$run_c =  mysqli_query($con,$insert_c);
	$sel_cart  = "SELECT * FROM cart WHERE ip_add='$ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if ($check_cart == 0) {
	//	$_SESSION['customer_email'] = $c_email;
echo "<script>alert('$c_street Account has been created successfully  Check your inbox to activate your account we want you to be secure'); </script>
	 	<META http-equiv='refresh' content='0;checkout.php'>";
	 
	 } 
	 else{
	 		//$_SESSION['customer_email'] = $c_email;

	 	echo "<script>alert('Account has been created successfully Check your inbox to activate your account we want you to be secure');</script><META http-equiv='refresh' content='0;checkout.php'>";
	 	

	 }

	}
	else{

		echo '<div class="alert alert-warning alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong><br>Check out you Email already exist.
</div>';
	}
}


?>
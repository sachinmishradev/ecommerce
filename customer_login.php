
<?php
@session_start();
include("includes/db.php");



?>


<div class="col col-sm-6  col-sm-push-3">
<form class="form-signin" method="post" action="">
	        <h2 class="form-signin-heading">Please sign in</h2>
	        <br>
	        <label for="inputEmail" class="sr-only">Email address</label>
	        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
	        <br>
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
	        <div class="checkbox">
	          
	        <a href="forgot_pass.php">Forgot password ?</a>
	        </div>
	        <input class="btn btn-lg btn-primary btn-block"  type="submit" name="login" value="login"/>
 </form><br>
 <a  href='customer_register.php' class="btn btn-lg btn-warning btn-md"  type="submit"  value="New? Sign up Here">New? Register Here</a>
 </div>

<?php
if (isset($_POST['login'])) {
 $c_emai = trim($_POST["email"]);
		$c_pass =  trim($_POST['pass']);

	$run_c = mysqli_query($con,"SELECT * FROM customers WHERE customer_pass='$c_pass' AND customer_email='$c_emai'  AND activated='1'");
	  	$check_customer = mysqli_num_rows($run_c);
    $run = mysqli_fetch_array($run_c);
       if ($c_emai  == $run['customer_email']) { 
				if ($check_customer < 1) {
					echo "<script>alert('Password or email is incorrect or you may check and go through the activation link');</script>";
					exit();
				}
				else{
											     			$ip  = getIp();
							$sel_cart  = "SELECT * FROM cart WHERE ip_add='$ip'";
							$run_cart = mysqli_query($con,$sel_cart);
							$check_cart = mysqli_num_rows($run_cart);
							if ($check_customer > 0 AND $check_cart == 0 ) {
								$_SESSION['customer_email'] = $c_emai;
							 	echo "<script>alert('You logged in successfully'); </script>
							 	<META http-equiv='refresh' content='0;customer/my_account.php'>";
							}
							else{

								$_SESSION['customer_email'] = $c_emai;
							 	echo "<script>alert('You logged in successfully'); </script>
							 	<META http-equiv='refresh' content='0;checkout.php'>";
							}
				}
				
				  }
    	else{
       			echo  "<br><h3 style='color:red;'>Checkout your mail</h3>";
      		}
 
 }



?>
<?php @session_start(); include('includes/db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>forgot_pass page</title>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" type="text/css" href="styles/style.css">
<script src="https://use.fontawesome.com/fc3e85f604.js"></script>
</head>
<body>

</body>
</html>

<?php 
if (isset($_REQUEST['token'])) {
  $tok = $_REQUEST['token'];
  $seltoken = "select  * from resetpass where unicode='$tok'";
  $srun = mysqli_query($con,$seltoken);
  $count = mysqli_num_rows($srun);
  if($count > 0){
      $up = "UPDATE resetpass set activatereset='1' where unicode='$tok'";
      $up_run = mysqli_query($con,$up);
     $ma =  $_REQUEST['mail'];
      $sel_email = "SELECT * FROM customers where  customer_email='$ma'";
      $run_email = mysqli_query($con,$sel_email);
      $cu_arr = mysqli_fetch_array($run_email);

?>


          <div class="container" style="margin-top:18%;">
                    <div class="col col-sm-4 col-sm-push-4">
                    <div class="thumbnail text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Enter new password</h2>
                          
                            <div class="panel-body">
                              
                              <form class="form" action="" method="post">
                              
                                  <div class="form-group">    
                                  <input id="passwordn" id='pass' name="newpass" placeholder="password" class="form-control" type="password" required><br>
                                   </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="update" name="update" type="submit">
                                  </div>
 </form>
                            </div>
                        </div>
                    </div>






<?php

if (isset($_REQUEST['update'])) {
    $pass = $_REQUEST['newpass'];
    $up = "UPDATE customers SET customer_pass='$pass' where customer_email='$ma'";
    $up_run = mysqli_query($con,$up);
    if ($up_run) {
      echo "<br><center><h1>password has been updated successfully </h1></center>";
      
      echo "<META http-equiv='refresh' content='3;index.php'>";
    }
}
  }
  else{
   echo "<h1> sorry try again later ! </h1>";
  }
} 
else{
?>
                    <div class="container" style="margin-top:18%;">
                    <div class="col col-sm-4 col-sm-push-4">
                    <div class="thumbnail text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">forgot PAssword?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                              <form class="form" action="" method="post">
                              
                                  <div class="form-group">    
                                  <input id="emailInput" id='Email' name="resetpassemail" placeholder="Email" class="form-control" type="email" required><br>
                                   </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="send my Password" name="reset_pass" type="submit">
                                  </div>

                                
     
<?php

include("includes/db.php");
if (isset($_POST['reset_pass'])) {

  $email  = strtolower(mysqli_real_escape_string($con,$_POST['resetpassemail']));
  
  $sel_email = "SELECT * FROM customers where  customer_email='$email'";
  $run_email = mysqli_query($con,$sel_email);
  $cu_arr = mysqli_fetch_array($run_email);
  $cu_email = $cu_arr['customer_email'];
  if ($cu_email == $email){
      

    $token = mt_rand();
      $to = $email;
      $subject = "password reset link mail click to reset your password";
      $message = "please click on the below link in order to activate your account ";
      $message .='<a href="http://sachinmishra199747.000webhostapp.com/forgot_pass.php?token='.$token.'&mail='.$email.'">Click to activate</a>';
      $headers = "Form : sachinmishra199747@gmail.com\n";
      $headers .= "MIME-Version : 1.0\n";
      $headers .= "Content-type:text/html;charset=iso-8859-1\n";

      mail($to, $subject, $message,$headers);
      $resetquery = "INSERT  INTO  resetpass SET mail='$email',unicode='$token'";
      $run = mysqli_query($con,$resetquery);

       echo "<h2>Details  sent to </h2>";
       echo $email;
       $_SESSION['email'] = $email;
       

    }


    else
    {
    echo "<script>alert('This mail is not exist !');</script>";
    } 
}

?>                         </form>
                            </div>
                        </div>
                    </div>
</div>
<center><a href='all_products.php' class='btn btn-success'>Back to shop</a></center>
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

                        <div class="thumbnail text-center">
                          <h3><i class="fa fa-lock fa-4x"></i></h3>
                          <h2 class="text-center">Change PAssword?</h2>
                          <p>You can reset your password here.</p>
                            <div class="panel-body">
                              
                              <form class="form" action="" method="post">
                              
                                  <div class="form-group">
                                     
                                      <input id="emailInput" name="current_pass" placeholder="Current password" class="form-control" type="password" required><br>
                                      <input id="emailInput" name="new_pass" placeholder="New password" class="form-control" type="password" required><br>
                                      <input id="emailInput" name="new_pass_again" placeholder="New  password again" class="form-control" type="password" required><br>
                                  </div>
                                  <div class="form-group">
                                    <input class="btn btn-lg btn-primary btn-block" value="Change My Password" name="change_pass" type="submit">
                                  </div>
                                
                              </form>
                            </div>
                        </div>
                    


<?php

include("includes/db.php");
if (isset($_POST['change_pass'])) {
  $user = $_SESSION['customer_email'];
  $current_pass  = $_POST['current_pass'];
  $new_pass = $_POST['new_pass'];
  $new_pass_again = $_POST['new_pass_again'];

  $sel_pass = "SELECT * FROM customers where customer_pass='$current_pass' AND customer_email='$user'";
  $run_pass = mysqli_query($con,$sel_pass);
  $cu_arr = mysqli_fetch_array($run_pass);
$cu_pass = $cu_arr['customer_pass'];
  if ($cu_pass == $current_pass){
        if ($new_pass == $new_pass_again) {
            $up_pass = "UPDATE customers set customer_pass='$new_pass' where customer_pass='$current_pass'";
            $runup_pass = mysqli_query($con,$up_pass);
            if ($runup_pass) {
              echo "<script>alert('Updated successfully');</script>";
              echo "<META http-equiv='refresh' content='0;my_account.php'>";
            }
            else
            {
                echo "<script>alert('new passwords do not match ');</script>";
            }

            }
            else
            {
               echo "<script>alert('new passwords do not match ');</script>";
            }
    } 
    else
    {
    echo "<script>alert('check out your current password');</script>";
    } 
}

?>
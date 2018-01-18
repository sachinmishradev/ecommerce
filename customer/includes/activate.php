<?php

include("db.php");


$token = $_REQUEST['token'];
$select = mysqli_query($con,"SELECT * FROM customers where token='$token'");
echo mysqli_num_rows($select);
if(mysqli_num_rows($select)==1){
$update = mysqli_query($con,"UPDATE customers SET  activated='1' where token='".$token."'");
echo "you have successfully activated your account now you can proceed to login !   ";
echo '<script>window.open("../checkout.php");</script>';
}
else{echo "Sorry please try again later";}



?>
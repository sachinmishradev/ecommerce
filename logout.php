<?php
include('functions/functions.php');
@session_start();
$ip = getIp();
global $con;
 $delete_product = "DELETE FROM cart WHERE  ip_add='$ip'";
 $run_delete = mysqli_query($con,$delete_product);
session_destroy();
mysqli_close($con);
echo "<META http-equiv='refresh' content='0;index.php'>";


?>
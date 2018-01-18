
<img src="images/packing.webp">
<?php if($_REQUEST['s'] == 1){ 
include("functions/functions.php");
include("includes/db.php");
$ip = getIp();
mysqli_query($con,"DELETE FROM cart where ip_add='$ip'"); 

echo "<META http-equiv='refresh' content='5;customer/my_account.php'>";

 } ?>
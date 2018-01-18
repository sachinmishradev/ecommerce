<!DOCTYPE html>
<html>
<head>

  <meta charset="UTF-8">
  <meta name="custom web store" content="Free Web tutorials">
  <meta name="keywords" content="HTML,CSS,XML,JavaScript">
  <meta name="author" content="sachin mishra">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="includes/style.css">
<script src="https://use.fontawesome.com/fc3e85f604.js"></script>
	<title></title>
</head>
<body>

<?php

include("db.php");


$token = $_REQUEST['token'];
$select = mysqli_query($con,"SELECT * FROM customers where token='$token'");
echo mysqli_num_rows($select);
if(mysqli_num_rows($select)==1){
$update = mysqli_query($con,"UPDATE customers SET  activated='1' where token='".$token."'");
echo "you have successfully activated your account now you can proceed to login !   ";
echo "<META http-equiv='refresh' content='0;../checkout.php'>";
}
else{echo "Sorry please try again later";}



?>


</body>
</html>
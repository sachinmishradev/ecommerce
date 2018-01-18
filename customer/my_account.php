<!DOCTYPE html>
<?php @session_start(); 

if (!isset($_SESSION['customer_email'])) {

  echo "<META http-equiv='refresh' content='0;../checkout.php?b=1'>";
}
else{

?>
<?php include("../functions/functions.php"); ?>
<html>
<head>
  <link rel="icon" href="../images/logo.jpg" type="image/gif" sizes="16x16">
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
<link rel="stylesheet" type="text/css" href="styles/style.css">

<script src="https://use.fontawesome.com/fc3e85f604.js"></script>
</head>
<body>
<nav class="navbar navbar navbar-fixed-top" id="navbartopmenu">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar I" style="background-color:#000"></span>
        <span class="icon-bar I"style="background-color:#000"></span>
        <span class="icon-bar I"style="background-color:#000"></span> 
      </button>
      <a class="navbar-brand" href="#">
  <img src="../images/logo.jpg" style="" class="img img-circle" alt="logo" style="padding-top:100px;" height="40px" width="40px" ></a>
     <a href="#" style="font-size:20px;font-weight:bolder;line-height:3;color:#796;">Lifeistyli</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        <li class="active"><a href="../index.php">Home</a></li>
        <li><a href="my_account.php?my_orders">my Account</a></li>
        <li><a href="../all_products.php">All products</a></li>
        </ul>
   
   <ul class="nav navbar-nav navbar-right" style="margin-left:2%;padding-top:10px;margin-right:2%;">
<form action="results.php" method="get" class="form-inline" >
<div class="input-group">
<input  class="form-control" size="30" name='user_query' type="text"  placeholder="search" required/>
<div class="input-group-btn">
<input class="btn btn-danger"  size="40"  name="search"   type="submit" value="search"/>
</div>
</div>
</form>
      </ul>
    </div>
  </div>
</nav>


<br><br><br><br><br>

<div class="container">
<div class="row">
<div class="col col-sm-3" style="margin-left:20px;">
<?php
$user = $_SESSION['customer_email'];
$get_img = "select * from customers where customer_email='$user'";
$run_img = mysqli_query($con,$get_img);
$row_img = mysqli_fetch_array($run_img);
$c_image = $row_img['customer_image'];
$c_name = $row_img['customer_name'];

echo "<img src='customer_images/$c_image' width='150px' height='150px' alt='Your image'>";


?>
<h1>My Account</h1>
<br>
 <?php if(isset($_SESSION['customer_email'])){echo  "<span style='color:#efd;font-family:arial;background-color:#27ae60;padding:5px;font-size:14px;'><b>&nbsp;Welcome&nbsp;</b><br><br> &nbsp;".$_SESSION['customer_email'] ."&nbsp;</span>";} ?>

<br>
<br>
<ul class="nav nav-pills nav-stacked " style="width:200px">
  <li class="active"><a href="my_account.php?my_orders">My Orders</a></li>
  <li><a href="my_account.php?edit_account">Edit Account</a></li>
  <li><a href="my_account.php?change_pass">ChangePassword</a></li>
  <li><a href="my_account.php?delete_account">Delete Account</a></li>
  <li><a href="../logout.php">Logout</a></li>
 </ul>
</div>
 <div id="products_box" class="col col-sm-8"> 
  

  <?php 

    if (!isset($_GET['my_orders'])) {
      if (!isset($_GET['edit_account'])) {
        if (!isset($_GET['change_pass'])) {
          if (!isset($_GET['delete_account'])) {
            if (!isset($_GET['cancle_order'])) {
            ?>
            <br><br><br><br><br><br><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>you can see your order's progress just by clicking this link </b><a href="my_account.php?my_orders">link</a>
<?php
          }
        }

        }
      }
    }

  ?>

<?php 


  if (isset($_GET['edit_account'])) {
    include("edit_account.php");
  }
  if (isset($_GET['change_pass'])) {
    include('change_pass.php');
  }
   if (isset($_GET['delete_account'])) {
    include('delete_account.php');
  }
   if (isset($_GET['my_orders'])) {
    include('my_orders.php');
  }
   if (isset($_GET['cancle_order'])) {
    include('cancle_order.php');
  }
?>




</div>
</div>
</div>
<br><br><br><br>  
 
<?php 

include("includes/footer.php");

}
?>
<!DOCTYPE html>

<?php @session_start(); include("functions/functions.php"); ?>
<html>
<head>
<?php include("headincnav.php"); ?>
<br><br><br><br><br> 
<?php include("cartinc.php"); ?>
<br><br><br>
<div class="container" id="products">

<div id="product-box">

</div>
<?php

if (!isset($_SESSION['customer_email'])) {
  include("customer_login.php");
}

else{
  include("payment.php");
}





?>
</div>
</div>


 <br><br><br> <br><br><br>

<?php 

include("includes/footer.php");


?>
 <script type="text/javascript">
     $('#mainCarousel').carousel({
    interval: 10000
});
</script>
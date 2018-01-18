<?php  @session_start(); cart();
 ?>
<div id='fixedcart' >
 <a href="cart.php" style="color:#fff;font-size:18px;font-family:'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Geneva, Verdana, sans-serif;text-decoration:none;"><span class="glyphicon glyphicon-shopping-cart" style="color:#fff;font-size:20px;">&nbsp;
 </span>
 <?php
	
	total_items();echo "&nbsp;&nbsp;&nbsp;price  &#8377;";total_price();
 
echo  '</a><br>';
if(isset($_SESSION['customer_email'])){echo "<a href='index.php' style='text-decoration:none;color:#044;'>Back to shop &nbsp;&nbsp;&nbsp;&nbsp;</a><span style='color:#201;font-family: Verdana,'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Geneva, Verdana, sans-serif;'>" . $_SESSION['customer_email']."<span>";}else{echo "<span style='color:#fff;'>Welcome "." Guest&nbsp;&nbsp;&nbsp;&nbsp;</span>";}

 if(!isset($_SESSION['customer_email'])){echo "<a href='index.php' style='text-decoration:none;font-weight:bolde;color:#044;'>  back to  shop &nbsp;&nbsp;&nbsp;&nbsp;</a><a href='checkout.php'  style='color:#fff;text-decoration:none;'>login</a> ";} else{echo "  <a href='logout.php'style='color:#fff;text-decoration:none; '>&nbsp;&nbsp; logout</a>";}
?>

</div>
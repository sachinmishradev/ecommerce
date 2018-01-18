<!DOCTYPE html>

<br>

<br>
<br>
<br>
<?php 

@session_start();

?>
<?php include("functions/functions.php"); ?>
<html>
<head>

<?php include("headincnav.php"); ?>
<style type="text/css">
table { 
  width: 50%; 
  border-collapse: collapse; 
}
/* Zebra striping */
tr:nth-of-type(odd) { 
  background: #eee; 
}
th { 
  background: #233; 
  color: white; 
  font-weight: bold; 
}
td, th { 
  padding: 6px; 
  
  text-align: left; 
}
@media only screen and (max-width: 760px),
(min-device-width: 768px) and (max-device-width: 1024px)  {

  /* Force table to not be like tables anymore */
#heading{display:none;}
  table, thead, tbody, th, td, tr { 
    display: block;
  }
  
  /* Hide table headers (but not display: none;, for accessibility) */
  thead tr { 
    position: absolute;
display:none;
    
  }
  
  tr {  }
  
  td { 
    /* Behave  like a "row" */
    border: none;
    position: relative;
    padding-left: 50%; 

  }
  
  td:before { 
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%; 
    padding-right: 10px; 
    white-space: nowrap;
  }
  th{
    background: #fff;
    color:#000;
  }
  
  /*
  Label the data
  */
}
</style>
<br><br><br> 
<?php include("cartinc.php"); ?>
<br><br><br><br>
<div class="container" id="products">
<div id="product-box" style="style="overflow-x:auto;"">
<form method="post" class="form-group" action="cart.php" enctype="multipart/form-data">
<table id="r" class="table table-condensed" >
  <tr id='heading'>
    
    <th>product(s)</th>
    <th>Size</th>
    <th>Quantity</th>
    <th>Total Price</th>
    <th>Remove</th>
  </tr>

  <?php 

    $total = 0;
    $sub_ittr_total = 0;
    global $con;
    $ip = getIp();
    
    if (isset($_SESSION['customer_email'])) {
      $cust_email  = $_SESSION['customer_email'];
       $user_id = mysqli_query($con,"select * from customers where customer_email='$cust_email'");
     $user_id_run =  mysqli_fetch_array($user_id);
     $_SESSION['user_id'] = $user_id_run['customer_id'];
    
    }
    
   
   
    $sel_price  = "select * from cart where ip_add='$ip' ";
    $run_price = mysqli_query($con,$sel_price);
    $checkhide = mysqli_num_rows($run_price);

    while ($p_price = mysqli_fetch_array($run_price)) {
     $si =  $p_price['size'];
     $q_t =  $p_price['qty'];
      $pro_id = $p_price['p_id'];
      $pro_price = "SELECT * FROM products where product_id='$pro_id'";
      $run_pro_price = mysqli_query($con,$pro_price);
      
      while ($pp_price = mysqli_fetch_array($run_pro_price)) {

        
        $product_price = array($pp_price['product_price']);
        $product_title = $pp_price['product_title'];
        $product_image = $pp_price['product_image'];
        $single_price =  $pp_price['product_price'];
        $values =  array_sum($product_price);
        $sub_ittr_total =$sub_ittr_total + ($single_price * $q_t);
        $rateforqty = $single_price * $q_t;
        $total = $total+$values;
        
   
    ?>

      <tr >
      
       <td><?php echo "<h4>".$product_title."</h4>"; ?><br>
       <img  class="img img-thumbnail" src="product_images/<?php echo $product_image; ?>" width="120" height="120"/><br>
       </td>
       <td><b> SIZE : </b> <button type="text"   maxlength="3"  class="btn btn-danger btn-lg" value="" name="qty" disabled><?php echo $si; ?></button>
       </td>
        
        <td>
        <b>Quantity :</b> <button type="text"   maxlength="3"  class="btn btn-warning btn-lg" value="" name="qty" disabled><?php echo $q_t; ?></button>
        </td>
       <td> <p class='card-text' id='cartclicks1'>
      &nbsp;</del>&nbsp;&nbsp;<?php echo "&#8377;".$single_price; ?> &nbsp;<i>only </i>
      <hr>
      <p class='card-text'>
      
      &nbsp;</del>&nbsp;&nbsp;<?php echo "&#8377;".$rateforqty; ?> &nbsp;<i>for <?php echo $q_t; ?> </i>

<hr>
     <td><a  href="cart.php?up=<?php echo $pro_id; ?>" class="btn btn-danger " type="button" name="remove">Delete</a></td>
      </tr>
      
      <?php

    
       }}


        ?>
    <tr>

        
         <td colspan="">
         <?Php if ($checkhide > 0) { ?>
   <a  style='padding:10px;padding-left:100px;padding-right:100px;' href="checkout.php?paye_email=<?php  
 if(isset($_SESSION['customer_email'])){ echo $_SESSION['customer_email'];} ?>&paye_customer_id=<?php 
 if(isset($user_id_run['customer_id'])){ echo $user_id_run['customer_id']; } ?>&payable_amount=<?php 
 if(isset($sub_ittr_total)){ echo $sub_ittr_total; } ?>" class="btn btn-success ">Checkout</a></td>
      
     
       <?php  }
       else{
        echo "<img src='images/download.png'>" ;
        } ?>
        <td>
</td><td>
</td>

<td colspan="2">      
        <b><span class='btn btn-warning' style='font-size:18px;color:#000;' disabled>Sub Total :&nbsp;&nbsp;<?php echo "&#8377;".$sub_ittr_total; ?></span>
        </td>
    </tr>

    <tr >
     <td colspan="5" align="center"> <a href='all_products.php' class="btn btn-primary" value="Continue Shopping">Continue Shopping</a></td>
     
    </tr>
  </table>
</form>

<?php 

$ip = getIp();
global $con;
if(isset($_REQUEST['up'])) {
unset($_SESSION['pro']);
unset($_SESSION['check']);

 $remove_id = $_REQUEST['up'];

    $delete_product = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'";
    $run_delete = mysqli_query($con,$delete_product);
    if ($run_delete) {
      echo  "<META http-equiv='refresh' content='0;cart.php'>";
    }

  
}
if (isset($_POST['continue'])) {
  echo  "<META http-equiv='refresh' content='0;index.php'>";
}
 
?>


</div>
</div>


<?php 

include("includes/footer.php");


?>
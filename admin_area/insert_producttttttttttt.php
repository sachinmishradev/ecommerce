<!DOCTYPE>

<?php 

include("includes/db.php");

?>
<html>
	<head>
		<title>Inserting Product</title> 
		
<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>
        tinymce.init({selector:'textarea'});
</script>
	</head>
	
<body bgcolor="skyblue">


	<form action="insert_product.php" method="post" enctype="multipart/form-data"> 
		
		<table align="center" width="795" border="2" bgcolor="#187eae">
			
			<tr align="center">
				<td colspan="7"><h2>Insert New Post Here</h2></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Title:</b></td>
				<td><input type="text" name="product_title" size="60" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Category:</b></td>
				<td>
				<select name="product_cat" >
					<option>Select a Category</option>
					<?php 
		$get_cats = "select * from categories";
	
		$run_cats = mysqli_query($con, $get_cats);
	
		while ($row_cats=mysqli_fetch_array($run_cats)){
	
		$cat_id = $row_cats['cat_id']; 
		$cat_title = $row_cats['cat_title'];
	
		echo "<option value='$cat_id'>$cat_title</option>";
	}?>
                          </select>
                                </td></tr><tr>
				<td align="right"><b>Product Brand:</b></td>
				<td>
				<select name="product_brand" >
					<option>Select a Brand</option>
					<?php 
		$get_brands = "select * from brands";
	
	$run_brands = mysqli_query($con, $get_brands);
	
	while ($row_brands=mysqli_fetch_array($run_brands)){
	
		$brand_id = $row_brands['brand_id']; 
		$brand_title = $row_brands['brand_title'];
	
	echo "<option value='$brand_id'>$brand_title</option>";
	}					
?>
</select>
</td>			
				<tr><td align="right"><b>Product Image:</b></td> </tr>
				<tr><td align="right"><input type="file" name="product_image" /></td>
			        <tr><td align="right">pro image 1<input type="file" name="product_image1" /></td></tr>
				<tr><td align="right">pro image 2<input type="file" name="product_image2" /></td></tr>
				<tr><td align="right">pro image 3<input type="file" name="product_image3" /></td></tr>
				<tr><td align="right">pro image 4<input type="file" name="product_image4" /></td></tr>
			
			
			<tr>
				<td align="right"><b>Product Price:</b></td>
				<td><input type="text" name="product_price" required/></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Description:</b></td>
				<td><textarea name="product_desc" cols="20" rows="10"></textarea></td>
			</tr>
			
			<tr>
				<td align="right"><b>Product Keywords:</b></td>
				<td><input type="text" name="product_keywords" size="50" required/></td>
			</tr>
			
			<tr align="center">
				<td colspan="7"><input type="submit" name="insert_post" value="Insert Product Now"/></td>
			</tr>
		</table>
	</form>
</body> 
</html>
<?php 

	if(isset($_POST['insert_post'])){
	
		//getting the text data from the fields
		$product_title = $_POST['product_title'];
		$product_cat= $_POST['product_cat'];
		$product_brand = $_POST['product_brand'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];
	
		//getting the image from the field
		$product_image = $_FILES['product_image']['name'];
		$product_image_tmp = $_FILES['product_image']['tmp_name'];
		move_uploaded_file($product_image_tmp,"../product_images/$product_image");
		//getting the image1 from the field
		$product_image1 = $_FILES['product_image1']['name'];
		$product_image_tmp1 = $_FILES['product_image1']['tmp_name'];
		move_uploaded_file($product_image_tmp1,"../product_images/$product_image1");
		//getting the image2 from the field
		$product_image2 = $_FILES['product_image2']['name'];
		$product_image_tmp2 = $_FILES['product_image2']['tmp_name'];
		move_uploaded_file($product_image_tmp2,"../product_images/$product_image2");
		//getting the image3 from the field
		$product_image3 = $_FILES['product_image3']['name'];
		$product_image_tmp3 = $_FILES['product_image3']['tmp_name'];
		move_uploaded_file($product_image_tmp3,"../product_images/$product_image3");
		//getting the image4 from the field
		$product_image4 = $_FILES['product_image4']['name'];
		$product_image_tmp4 = $_FILES['product_image4']['tmp_name'];
		move_uploaded_file($product_image_tmp4,"../product_images/$product_image4");
	
		 $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')"; 
		 $insert_pro = mysqli_query($con, $insert_product);

		 
		 if ($product_image1 == '') {
		 	$product_image1 = 'default.jpg';
		 }
		 if($product_image2 == '') {
		 	$product_image2 = 'default.jpg';
		 }
		 if($product_image3 == '') {
		 	$product_image3 = 'default.jpg';
		 }
		 if($product_image4 == '') {
		 	$product_image4 = 'default.jpg';
		 }
		 
		 
		 
		 

		 $img_insert = "INSERT INTO details SET image1='$product_image1',image2='$product_image2',image3='$product_image3',image4='$product_image4',main_image='$product_image'";
		 $img_insert_run = mysqli_query($con,$img_insert);
		 if($img_insert_run){
		 
		 echo "<script>alert('Product Has been inserted!')</script>";
		 echo "<script>window.open('index.php?insert_product','_self')</script>";
		 
		 }
	}








?>
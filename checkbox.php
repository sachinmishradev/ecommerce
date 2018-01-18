<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<form action="" method="post">
	<input type="text"  name="text"/>
	M<input type="radio" value="medium" id="s" name="check"/>
	L<input type="radio" value="large"id="s" name="check"/>
	XL<input type="radio" value="xlarge"id="s" name="check"/>
	<input type="submit" name="submit"/>

</form>
<?php 
if (isset($_POST['submit'])) {
	echo $text = $_POST['text'];
	echo $ch  = $_POST['check'];

}	

?>
</body>
</html>
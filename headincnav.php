<link rel="icon" href="images/logo.jpg" type="image/gif" sizes="16x16">
	<title>Welcome on Lifeistyli Store</title>
  <meta charset="UTF-8">
<!-- Chrome, Firefox OS and Opera -->
<meta name="theme-color" content="#F62459">
<!-- Windows Phone -->
<meta name="msapplication-navbutton-color" content="#F62459">
<!-- iOS Safari -->
<meta name="apple-mobile-web-app-status-bar-style" content="#F62459">
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
	<img src="images/logo.jpg" style="" class="img img-circle"  style="padding-top:100px;" height="40px" width="40px" ></a>
     <a href="#" style="font-size:20px;font-weight:bolder;line-height:3;color:#796;">Lifeistyl!</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">

      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="customer/my_account.php">my Account</a></li>
        <li><a href="all_products.php">All products</a></li>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories/Brands
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <?php getCats(); ?>
        <li><p style="padding-left:5px;"><b>Brands</b></p></li>
        <?php getBrands(); ?>

        <li><a href="customer_register.php" class="s"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>

        </ul>
        
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
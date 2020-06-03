<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("Location: customer_login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment</title>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/payment.css">
</head>
<body>
	<div class="navbar">
  		<a href="home.php">Home</a>
  		<a href="view_menu.php">Menu</a>
      	<div class="dropdown">
      		<a href="my_cart.php">Cart</a>
      		<a href="customer_signout.php">Sign out</a>
       	</div>
	</div>
	<div class="pay">
		<h1>Choose your payment way:</h1>
		<a href="online_pay.php"><button class="credit">Pay Online</button></a>
		<a href="checkout.php"><button class="cash">Cash on delivery</button></a>
	</div>
</body>
</html>
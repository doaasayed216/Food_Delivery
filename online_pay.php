<?php
	session_start();
	if(!isset($_SESSION['username']))
		header("Location: customer_login.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Online Payment</title>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<link rel="stylesheet" type="text/css" href="css/home.css">
	<link rel="stylesheet" type="text/css" href="css/onlinepay.css">
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
	<h1>Enter your payment details below</h1>
	<form action = "checkout.php">
		<input type="text" name="num1" placeholder="0000" autocomplete="off" required>
		<input type="text" name="num2" placeholder="0000" autocomplete="off" required>
		<input type="text" name="num3" placeholder="0000" autocomplete="off" required>
		<input type="text" name="num4" placeholder="0000" autocomplete="off" required><br>
		<input type="text" name="mon" placeholder="MM" autocomplete="off" required>
		<input type="text" name="year" placeholder="YY" autocomplete="off" required>
		<input type="text" name="ccv" placeholder="CCV" autocomplete="off" required>
		<input class="name" type="text" name="name" placeholder="Name on the card" autocomplete="off" required><br>
		<a href="checkout.php"><button>Pay now</button></a>
	</form>
	<br><br><br><br><br><br>
<footer class="footer">
  <br><p> Food Delivery | &copy All Rights Reserved </p><br>
  </footer>
</body>
</html>
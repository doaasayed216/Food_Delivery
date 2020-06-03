<?php
	session_start();
	if (!isset($_SESSION['username'])) {
		header("Location: customer_login.php");
	}

	include 'classes/database.php';
	include 'classes/UserFactory.php';

	$instance = Database::getInstance();
  	$conn = $instance->getConnection();
  	$user = new UserFactory($conn);
  	$customer = $user->setUser('Customer');

	$username = $_SESSION['username'];
	$stmt = $customer->search_for_cart($username);
	$num = $stmt->rowCount();

	if($num > 0)
	{
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			
			$food_name = $row['food_name'];
			$price = $row['price'];
			$quantity = $row['quantity'];
			$username = $row['username'];

			$customer->add_order($food_name, $price, $quantity, $username);
			$customer->delete_cart($username);
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Check out</title>
	<link rel="stylesheet" type="text/css" href="css/nav.css">
	<style>
		.order
		{
			width: 60%;
			margin: auto;
			background-color: #ddd;
			text-align: center;
			padding: 50px;
			margin-top: 8%;
		}

		span
		{
			color: brown;
			font-weight: bold;
			font-size: 30px;
		}
	</style>
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
	<div class="order">
		<h1>Your order placed successfully</h1>
		<p>Thank you for shopping at Food Delivery! The ordering process is now complete.</p>
		<p>Your order will be delivered in <span>30 minute</span></p>
	</div>

</body>
</html>
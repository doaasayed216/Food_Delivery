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

	if (isset($_POST['delete'])) {
		$food_name = $_POST['food_name'];
		$username = $_SESSION['username'];
		$customer->delete_one_item($username , $food_name);
	}

	if(isset($_POST['empty']))
	{
		$username = $_SESSION['username'];
		$customer->delete_cart($username);
	}

	if (isset($_POST['check'])) {
		
		header("Location: payment.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My cart</title>
	  <link rel="stylesheet" type="text/css" href="css/nav.css">
  <link rel="stylesheet" type="text/css" href="css/home.css">
  <link rel="stylesheet" type="text/css" href="css/tables.css">
  <link rel="stylesheet" type="text/css" href="css/cart_items.css">
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


<table style="margin: 5%;" class="cart_table">
			<tr>
				<th>Item</th>
				<th>Item price</th>
				<th>Quantity</th>
				<th>Total price</th>
				<th>Action</th>
			</tr>
<?php			
	$stmt = $customer->search_for_cart($_SESSION['username']);
	$total = 0;

	if ($stmt) {
		$total_price = 0;
		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			
		$total_price = $row['price'] * $row['quantity'];
		?>
			
			<tr>
				<td><?php echo $row['food_name'];?></td>
				<td><?php echo $row['price'];?></td>
				<td><?php echo $row['quantity'];?></td>
				<td><?php echo $total_price;?></td>
				<td style="text-align: center">
					<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
					<input type="hidden" name="food_name" value="<?php echo $row['food_name'];?>">
					<button class="delete" name="delete">Delete</button>
					</form>
				</td>
			</tr>
<?php
		$total += $total_price;
		
	}

}

	?>
</table>

<label style="margin-left: 5%;font-weight: bold"><?php echo'Total Bill: ' . $total;?></label><br><br>

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<button type="submit" name="empty" class="empty">Empty cart</button>
<button type="submit" name="check" class="check">Check out</button>
</form>

</body>
</html>
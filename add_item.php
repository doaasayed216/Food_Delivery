<?php
session_start();
		if(!isset($_SESSION['username']))
		{
			header("Location: admin_login.php");
		}
		
	include 'classes/database.php';
	include 'classes/UserFactory.php';
	$instance = Database::getInstance();
  	$conn = $instance->getConnection();
  	$user = new UserFactory($conn);
	$admin = $user->setUser('Admin');
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$name = $_POST['food_name'];
		$description = $_POST['description'];
		$price = $_POST['price'];
		$path = $_POST['img_path'];
		$admin->add_item($name , $description , $price , $path);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add items</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/add_item.css">
</head>
<body>
	<div class="sidenav">
	  <a href="add_user.php">Add user</a>
	  <a href="view_items.php">View items</a>
	  <a href="view_orders.php">View orders</a>
	  <a href="add_item.php">Add item</a>
	  <a href="update_item.php">Update item</a>
	  <a href="delete_item.php">Delete item</a><hr>
	  <a href="admin_signout.php">Sign out</a>
	</div>
	<div class="content">
		<h1>Add items to your food list</h1>
		<form class="add-form" action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'><br>
			<input type="text" name="food_name" placeholder="Item name" autocomplete="off" required><br>
			<input type="text" name="description" placeholder="Description" autocomplete="off" required><bR>
			<input type="text" name="price" placeholder="Price" autocomplete="off" required><br>
			<input type="text" name="img_path" placeholder="Image path" autocomplete="off" required><br>
			<button type="submit" name="add">Add</button><br><br>
			<label style="font-weight: bold ; color: brown"><?php echo $admin->message;?></label>
		</form>
	</div>
</body>
</html>
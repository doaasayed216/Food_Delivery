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
  
	if(isset($_POST['add']))
	{
	  	$admin->fullname = $_POST['fullname'];
	  	$admin->username = $_POST['username'];
	  	$admin->email = $_POST['email'];
	  	$admin->password = $_POST['password'];
	  	$admin->contact = $_POST['contact'];
	  	$admin->add_user();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add user</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/view_items.css">
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
		<h1>Add user</h1>
		<form class="add-form" action="<?php echo $_SERVER['PHP_SELF']?>" method='POST'><br>
			<input type="text" name="fullname" placeholder="Full name" autocomplete="off" required>
			<input type="text" name="username" placeholder="Username" autocomplete="off" required>
			<input type="email" placeholder="Email" name="email" required autocomplete="off">
			<input type="password" placeholder="Password" name="password" required autocomplete="off">
			<input type="text" placeholder="Phone number" name="contact" required autocomplete="off">
			<button type="submit" name="add">Add</button><br><bR>
			<label style="font-weight: bold; color: brown;" ><?php echo $admin->message; ?></label>
		</form>
	</div>
</body>
</html>	
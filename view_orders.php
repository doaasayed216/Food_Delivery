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

	if (isset($_POST['serve'])) {
		$food_name = $_POST['food_name'];
		$username = $_SESSION['username'];
		$admin->delete_order($username , $food_name);
	}	
?>
<!DOCTYPE html>
<html>
<head>
	<title>View orders</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/tables.css">
	<style>
		.serve
		{
			background-color: brown;
			color: white;
			border:0;
			padding: 10px;
		}

		.serve:hover{background-color: #ed5c5c}
	</style>
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
		<h1 class="title">Orders</h1>
		<table>
		  <tr>
		    <th>Food name</th>
		    <th>Price</th>
		    <th>Quantity</th>
		    <th>Username</th>
		    <th>Action</th>
		  </tr>
		  <?php
		  	$stmt = $admin->view_all_orders();
		  	$num = $stmt->rowCount();
		  	if($num > 0){

		  		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		  		{
		  			extract($row);
		  			?>
		  			<tr>
					    <td><?php echo $row['food_name']?></td>
					    <td><?php echo $row['price'];?></td>
					    <td><?php echo $row['quantity'];?></td>
					    <td><?php echo $row['username'];?></td>
					    <td style="text-align: center">
							<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
								<input type="hidden" name="food_name" value="<?php echo $row['food_name'];?>">
								<input type="hidden" name="username" value="<?php echo $row['username'];?>">
								<button class="serve" name="serve">Serve</button>
							</form>
						</td>
					</tr>
				<?php
}
}
?>	
		</table>
	</div>
</body>
</html>
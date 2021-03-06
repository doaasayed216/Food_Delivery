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
?>
<!DOCTYPE html>
<html>
<head>
	<title>Update items</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/add_item.css">
	<style>
		.select
		{
			color: black;
		}
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
		<h1>Update items in your food list</h1>
		
		<form class="add-form" action="<?php echo $_SERVER['PHP_SELF'];?>" method = 'POST'>
			<input style="width: 70%" type="text" name="id" placeholder="Food id"  autocomplete="off">
			<button style="width: 20%" type="submit" name="find">Find</button><br><br>
			<?php
				if (isset($_POST['find'])) {
					$id = $_POST['id'];
					$row = $admin->view_one_item($id);
					if($row)
					{
					?>
					<input type="text" name="id" readonly value="<?php echo $row['food_id'];?>">
					<input type="text" name="name" value="<?php echo $row['food_name'];?>">
					<input type="text" name="description" value="<?php echo $row['description'];?>">
					<input type="text" name="price" value="<?php echo $row['price'];?>">
					<input type="text" name="path" value="<?php echo $row['img_path'];?>">	
					<button type="submit" name="update">Update</button>
					<?php
				}
				else{
					?>
					<label style="font-weight: bolder; color: brown">No item has this id, please Try again</label>
<?php }} ?>
				<?php 
					if(isset($_POST['update']))
					{
						$id = $_POST['id'];
						$name = $_POST['name'];
						$description = $_POST['description'];
						$price = $_POST['price'];
						$path = $_POST['path'];		
						$admin->update_item($id , $name , $description , $price , $path);
						?>
						<label style="font-weight: bolder; color: brown"><?php echo $admin->message; ?></label>
<?php } ?>	
		</form>
	</div>
</body>
</html>
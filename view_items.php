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
	<title>View items</title>
	<link rel="stylesheet" type="text/css" href="css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="css/tables.css">
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
		<h1 class="title">Your food list</h1>
		<table>
		  <tr>
		    <th>Item</th>
		    <th>Description</th>
		    <th>Price</th>
		    <th>Image path</th>
		  </tr>
		  <?php
		  $stmt = $admin->view_all_items();
		  $num = $stmt->rowCount();
		  	if($num > 0)
		  	{
		  		while($row = $stmt->fetch(PDO::FETCH_ASSOC))
		  		{
		  			extract($row);
		  			?>
		  			<tr>
					    <td><?php echo $row['food_name'];?></td>
					    <td><?php echo $row['description']?></td>
					    <td><?php echo $row['price'];?></td>
					    <td><?php echo $row['img_path'];?></td>
					</tr>
				<?php
}
}

?>	
		</table>
	</div>

</body>
</html>
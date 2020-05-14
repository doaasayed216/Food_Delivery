<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		header("Location: add_user.php");
	}

	include 'classes/database.php';
	include 'classes/UserFactory.php';

	$instance = Database::getInstance();
	$conn = $instance->getConnection();	
	$user = new UserFactory($conn);
	$admin = $user->setUser('Admin');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$admin->username = $_POST['username'];
		$admin->password = $_POST['password'];
		$admin->login();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="css/login_register.css">
</head>
<body>
	<div class="login-page">
		<div class="form">
			<h1>Admin Login</h1>
			<form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<label style="color: brown; font-weight: bold;"><?php echo $admin->message; ?></label><br>
				<input type="text" placeholder="Username" name="username" autocomplete="off" required><br>
				<input type="Password" placeholder="Password" name="password" autocomplete="new-password" required><br>
				<button type="submit"name="submit" value="login">login</button>
			</form>
		</div>
	</div>
</body>
</html>
<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		header("Location: home.php");
	}	

	include 'classes/database.php';
	include 'classes/UserFactory.php';

	$instance = Database::getInstance();
  	$conn = $instance->getConnection();
  	$user = new UserFactory($conn);
  	$customer = $user->setUser('Customer');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$customer->username = $_POST['username'];
		$customer->password = $_POST['password'];
		$customer->login();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/login_register.css">
	<div class="login-page">
		<div class="form">
			<h1>Login</h1>
			<form class="login-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<label style="color: brown; font-weight: bold;"><?php echo $customer->message; ?></label><br>
				<input type="text" placeholder="Username" name="username" autocomplete="off" required><br>
				<input type="Password" placeholder="Password" name="password" autocomplete="new-password" required><br>
				<button type="submit"name="submit" value="login">login</button>
				<p class="message">Not registered? <a href="register.php">Create an account</a></p>
				<p class="message">Manager? <a href="admin_login.php">Login from here</a></p>
			</form>
		</div>
	</div>
</head>
<body>

</body>
</html>
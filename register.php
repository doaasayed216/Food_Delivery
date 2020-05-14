<?php
	include 'classes/database.php';
	include 'classes/UserFactory.php';

	$instance = Database::getInstance();
  	$conn = $instance->getConnection();
  	$user = new UserFactory($conn);
  	$customer = $user->setUser('Customer');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$customer->fullname = $_POST['fullname'];
		$customer->username = $_POST['username'];
		$customer->email = $_POST['email'];
		$customer->password = $_POST['password'];
		$customer->address = $_POST['address'];
		$customer->contact = $_POST['contact'];
		$customer->add_user();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="css/login_register.css">
</head>
<body>
	<div class="register-page">
		<div class = "form">
			<h1>Register</h1>
			<form class="register-form" role="form" action="<?php echo $_SERVER['PHP_SELF']?>" method ='POST'>
				<div class="data">
					<label style="color: brown; font-weight: bold;"><?php echo $customer->message; ?></label><br>
					<input type="text" name="fullname" placeholder="Full name" autocomplete="off" required><br>
					<input type="text" name="username" placeholder="username" autocomplete="off" required><br>
					<input type="email" name="email" placeholder="email" autocomplete="off" required><br>
					<input type="password" name="password" placeholder="password" autocomplete="off" required ><br>
					<input type="text" name="address" placeholder="address" autocomplete="off" required><br>
					<input type="text" name="contact" placeholder="phone number" autocomplete="off" required><br>				
				</div>
				<div class="radio">
					<input type="radio" name="gender" value="male"required>
					<label>Male</label>
					<input type="radio" name="gender" value="female">
					<label>Female</label>
				</div>
				<button name="submit" type="submit">Sign up</button>
				<p class="message">Already registered? <a href="customer_login.php">Sign in</a></p>
			</form>
		</div>
	</div>
</body>
</html>
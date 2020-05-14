<?php
	include 'user.php';

	class Admin extends User
	{
		public $message;

		function __construct($db)
		{
			$this->conn = $db;
		}
		
		public function login()
		{
			$query = "SELECT username from manager where username=? AND password=?";
			$stmt = $this->conn->prepare($query);
			$stmt->execute(array($this->username , $this->password));
			$count = $stmt->rowCount();

			if($count > 0)
			{
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['username'] = $row['username'];
				header('Location: add_user.php');
				exit();
			}

			else{
				$this->message = 'invalid username or password';
			}
		}

		public function add_user()
		{
				
		}

		public function signout()
		{
			session_start();
			session_unset();
			session_destroy();
			header("Location: admin_login.php");
			exit();
		}
	}	
?>
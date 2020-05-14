<?php
	include 'user.php';

	class Customer extends User
	{
		public $address;
		public $message;
		private $conn;
		
		function __construct($db)
		{
			$this->conn = $db;
		}

		public function login()
		{
			$stmt = $this->conn->prepare("SELECT * from customer where username=? AND password=?");
			$stmt->execute(array($this->username , $this->password));
			$count = $stmt->rowCount();

			if($count > 0)
			{
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				$_SESSION['username'] = $row['username'];
				header('Location: home.php');
				exit();
			}

			else{
				$this->message = 'invalid username or password';
			}
		}

		public function add_user()
		{
			$query = "INSERT into customer(fullname , username , email , password , address , contact) values('$this->fullname' , '$this->username' , '$this->email' , '$this->password' , '$this->address' , '$this->contact')";

			$success = $this->conn->query($query);

			if($success)
			{
				header("Location: customer_login.php");
			}

			else
			{
				$this->message = 'Something wrong, please try another username';
			}
		}

		public function signout()
		{
			session_start();
			session_unset();
			session_destroy();
			header("Location: customer_login.php");
			exit();
		}
	}	
?>
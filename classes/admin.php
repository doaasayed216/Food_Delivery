<?php
	include 'user.php';
	include 'item.php';
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
			$query = "INSERT into manager(fullname , username , email , password , contact) values('$this->fullname' , '$this->username' , '$this->email' , '$this->password' , '$this->contact')";
			$success = $this->conn->query($query);
			if($success)
				$this->message = 'Added successfully';
	
			else
				$this->message = 'Something wrong, please try another username';			
		}

		public function signout()
		{
			session_start();
			session_unset();
			session_destroy();
			header("Location: admin_login.php");
			exit();
		}

		public function view_one_item($id)
		{
			$item = new Item($this->conn);
			$item->id = $id;
			$row = $item->view_one();
			return $row;
		}

		public function update_item($id , $name , $description , $price , $path)
		{
			$item = new Item($this->conn);

			$item->id = $id;
			$item->name = $name;
			$item->description = $description;
			$item->price = $price;
			$item->path = $path;

			$success = $item->update();

			if ($success) {
				$this->message = 'Updated successfully';
			}

			else{
				$this->message = 'Something wrong, please Try again';
			}

		}

	}	
?>

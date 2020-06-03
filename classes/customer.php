<?php
	include 'user.php';
	include 'item.php';
	include 'cart.php';
	include 'order.php';

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

		public function view_menu()
		{
			$item = new Item($this->conn);
			$stmt = $item->view_all();
			$num = $stmt->rowCount();
			if ($num > 0) {
				return $stmt;
			}
			else{
				$this->message = 'There is no items in your food list';
			}
		}

		public function add_to_cart($name , $price , $quantity , $username)
		{
			$cart = new Cart($this->conn);
			$cart->food_name = $name;
			$cart->price = $price;
			$cart->quantity = $quantity;
			$cart->username = $username;
			$cart->add();
		}

		public function search_for_cart($username)
		{
			$cart = new Cart($this->conn);
			$cart->username = $username;
			$stmt = $cart->find();
			if($stmt)
				return $stmt;
		}

		public function delete_one_item($username , $foodname)
		{
			$cart = new Cart($this->conn);
			$cart->username = $username;
			$cart->food_name = $foodname;
			$success = $cart->delete_one();
			if($success)
				$this->message = 'Deleted successfully';
			else
				$this->message = 'Something wrong, please Try again';
		}

		public function delete_cart($username)
		{
			$cart = new Cart($this->conn);
			$cart->username = $username;
			$success = $cart->delete_all();
			if($success)
				$this->message = 'Deleted successfully';
			else
				$this->message = 'Something wrong, please Try again';
		}

		public function add_order($name , $price , $quantity , $username)
		{
			$order = new Order($this->conn);
			$order->food_name = $name;
			$order->price = $price;
			$order->quantity = $quantity;
			$order->username = $username;
			$order->add();
		}
	}	
?>

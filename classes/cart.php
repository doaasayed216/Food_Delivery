<?php

	class Cart 
	{
		public $food_id;
		public $food_name;
		public $price;
		public $quantity;
		public $username;
		private $conn;

		function __construct($db)
		{
			$this->conn = $db;
		}

		public function add()
		{
			$query = "INSERT into cart(food_name , price , quantity , username) values ('$this->food_name' , '$this->price' , '$this->quantity' , '$this->username')";

			$success = $this->conn->query($query);

		}

		public function find()
		{
			$query = "SELECT * from cart where username = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->execute(array($this->username));
			
			return $stmt;			
		}

		public function delete_one()
		{
			$query = "DELETE from cart where username = ? and food_name = ?";
			$stmt = $this->conn->prepare($query);
			$success = $stmt->execute(array($this->username , $this->food_name));

			return $success;
		}

		public function delete_all()
		{
			$query = "DELETE from cart where username = ?";
			$stmt = $this->conn->prepare($query);
			$success = $stmt->execute(array($this->username));

			return $success;
		}
	}
?>
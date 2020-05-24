<?php
	
	class Order 
	{
		public $food_name;
		public $price;
		public $quantity;
		public $username;
		private $conn;
		
		function __construct($db)
		{
			$this->conn = $db;
		}

		public function view_all()
		{
			$query = "SELECT * from orders";
			$stmt = $this->conn->prepare( $query );
        	$stmt->execute();
 
        	return $stmt;
		}

		public function delete()
		{
			$query = "DELETE from orders where username = ? and food_name = ?";
			$stmt = $this->conn->prepare($query);
			$success = $stmt->execute(array($this->username , $this->food_name));

			return $success;
		}
	}
?>
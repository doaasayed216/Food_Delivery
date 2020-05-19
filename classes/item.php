<?php
	class Item 
	{
		public $id;
		public $name;
		public $description;
		public $price;
		public $path;
		private $conn;
			
		function __construct($db){
			$this->conn = $db;
		}
	
		public function view_one()
		{
			$query = "SELECT * from items where food_id = ?";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1 , $this->id);
			$stmt->execute();
			$count = $stmt->rowCount();

			if($count > 0){
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				return $row;
			}
		}

		public function update()
		{
			$query = "UPDATE items set 
						food_name = '$this->name', 
						description = '$this->description', 
						price = '$this->price', 
						img_path = '$this->path'
						where food_id = ?";

			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(1 , $this->id);
			$success = $stmt->execute();

			return $success;
		}
	}
?>
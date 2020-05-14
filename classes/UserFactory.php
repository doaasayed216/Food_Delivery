<?php

	
	class UserFactory 
	{
		private $output;
		private $conn;
		

		function __construct($db)
		{
			$this->conn = $db;
		}


		public function setUser($userType)
		{
			if($userType == null)
			{
				return null;
			}

			if($userType == 'Admin')
			{
				include 'classes/admin.php';
				return new Admin($this->conn);
			}

			if($userType == 'Customer')
			{
				include 'classes/customer.php';
				return new Customer($this->conn);
			}
		}
		
	}
?>
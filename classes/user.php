<?php
	
	abstract class User 
	{
		public $fullname;
		public $username;
		public $email;
		public $password;
		public $contact;
		
		abstract public function login();
		abstract public function add_user();
		abstract public function signout();
	}
?>
<?php
	include 'classes/database.php';
	include 'classes/UserFactory.php';

	$instance = Database::getInstance();
	$conn = $instance->getConnection();
	$user = new UserFactory($conn);
	$admin = $user->setUser('Admin');
	$admin->signout();
?>
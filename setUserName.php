<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$newUserName = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$newUserName = $_POST['newUserName'];
			$stmt 	= $conn->prepare('UPDATE `users` SET `user_nic_name`= ?  WHERE `user_id` = ?');
			$stmt   ->execute(array($newUserName, $_COOKIE['user-id']));
			echo $stmt->rowCount();

		} else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}







<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$newPassword = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$newPassword = $_POST['newPassword'];
			$stmt 	= $conn->prepare('UPDATE `users` SET `user_password`= ?  WHERE `user_id` = ?');
			$stmt   ->execute(array(sha1($newPassword), $_COOKIE['user-id']));
			echo $stmt->rowCount();

		} else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}


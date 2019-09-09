<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$message = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$message = $_POST['message'];
			$stmt 	= $conn->prepare('INSERT INTO `contact_us`(`message`, `massage_date`) VALUES (?, ?)');
			$stmt   ->execute(array($message, date("Y/m/d")));
			echo $stmt->rowCount();
		} else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}


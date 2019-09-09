<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	$reqId = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$reqId = $_POST['reqId'];
				$stmt 	= $conn->prepare('UPDATE `ask_course` SET `status`= 0 WHERE `req_id` = ?');
				$stmt   ->execute(array($reqId));


		} else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}


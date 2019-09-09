<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$mail = $pass = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
	$mail 		= $_POST['login-mail'];
	$pass 		=  $_POST['login-password'];
	$hashedPass = sha1($pass);


	$stmt 	= $conn->prepare('select user_email, user_password from users where user_email=? and user_password=?');
	$stmt   ->execute(array($mail, $hashedPass));
	$count 	= $stmt->rowCount();
	echo $count;
	}
	else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}

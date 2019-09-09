<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database


	$name = $mail = $number = $pass = $sp = $gen = $img =  '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$mail 	= $_POST['suser-mail'];
	$pass 	= $_POST['suser-pass'];
	$number = $_POST['suser-number'];
	$name	= $_POST['suser-name'];
	$sp 	= $_POST['suser-sp'];
	$gen 	= $_POST['gender'];

	// Genarate Profile Image
	if ($gen == 0 ) {
		$img = 'm/' . rand(1, 97) . '.png' ;
	} else {
		$img = 'f/' . rand(1, 44) . '.png' ;
	}

	$hashedPass = sha1($pass);


	$stmt = $conn->prepare('select user_email from users where user_email=?');
	$stmt->execute(array($mail));
	$count = $stmt->rowCount();
	if ($count >0 ) {
		echo "2";
	}else {
	$stmt = $conn->prepare('select uni_id from users where uni_id=?');
	$stmt->execute(array($number));
	$count = $stmt->rowCount();
	if ($count >0 ) {
		echo "3";
	}else {
		$stmt = $conn->prepare('INSERT INTO `users`(`user_nic_name`, `user_email`, `user_sp`, `user_password`, `uni_id`, `user_pic`, gender) VALUES (?, ?, ?, ?, ?, ?, ?)');
		$stmt->execute(array($name, $mail, $sp, $hashedPass, $number, $img, $gen));
		$count = $stmt->rowCount();
		echo $count;
	}

	}
	}
	else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}
<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	$content = $adminId = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$content = $_POST['content'];
		$adminId    = $_POST['adminId'];
				$stmt 	= $conn->prepare('INSERT INTO `ask_course`(`content_name`, `course_admin_id`, `user_id`, `date`) VALUES (?, ?, ?, ?)');
				$stmt   ->execute(array($content, $adminId, $_COOKIE['user-id'], date('y/m/d')));

	 } else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}
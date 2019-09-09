<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$adminId = $commentContent  = $courseId = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$adminId 			= $_POST['adminId'];
		$commentContent  	= $_POST['commentContent'];
		$courseId			= $_POST['courseId'];



		// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `others`
					(`other_desc`, `other_course`, `other_date`, `other_auther`, `other_admin_id`) 
					VALUES (?, ?, ?, ?, ?)');
				$stmt   ->execute(array($commentContent, $courseId, date("Y/m/d"), $_COOKIE['user-id'], $adminId));
	}else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}
<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	$needs = $courseId = $courseAdmin =  '';
	echo $_COOKIE['user-id'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$courseId = $_POST['courseId'];
		$needs    = $_POST['needs'];
		$courseAdmin = $_POST['adminId'];
					foreach ($needs as $need) { 
						$ins 	= $conn->prepare('INSERT INTO `ask_material`(`admin_id`, `course_id`, `user_id`, `material_type`, date) VALUES (?, ?, ?, ?, ?)');
						$ins   ->execute(array($courseAdmin, $courseId, $_COOKIE['user-id'], $need, date('y/m/d')));
					}

	 } else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}
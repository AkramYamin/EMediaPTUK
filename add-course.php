<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$courseName = $courseId  = $courseWeight = $adminType = '';
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$courseName 			= $_POST['course-name'];
		$courseId				= $_POST['course-id'];
		$courseWeight			= $_POST['course-weight'];
		$userId 				= $_COOKIE['user-id'];
				$stmt 	= $conn->prepare('SELECT `admin_type` FROM `admins` WHERE `user_id` = ?');
				$stmt   ->execute(array($userId));
				$row 	= $stmt->fetch();
				$adminType = $row['admin_type'];
				if(strlen($adminType)== 1){
					$adminType = '000' . $adminType;
				} else if(strlen($adminType)==2){
					$adminType = '00' . $adminType;
				} else if(strlen($adminType)==3){
					$adminType = '0' . $adminType;
				}
				if($adminType[3] == 1) {
					// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `uni_mand_courses`(`name`, `id`, `weight`, `admin`) VALUES (?, ?, ?, ?)');
				$stmt   ->execute(array($courseName, $courseId, $courseWeight, $adminType));
				echo $stmt->rowCount();
				} elseif ($adminType[3] == 2) {
					// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `uni_opt_courses`(`name`, `id`, `weight`, `admin`) VALUES (?, ?, ?, ?)');
				$stmt   ->execute(array($courseName, $courseId, $courseWeight, $adminType));
				echo $stmt->rowCount();
				} elseif ($adminType[3] == 3) {
					// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `coll_mand_courses`(`name`, `id`, `coll_id`, `weight`, `admin`) VALUES (?, ?, ?, ?, ?)');
				$stmt   ->execute(array($courseName, $courseId, $adminType[0], $courseWeight, $adminType));
				echo $stmt->rowCount();
				} elseif ($adminType[3] == 4) {
					// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `sp_mand_courses`(`name`, `id`, `sp_id`, `weight`, `admin`) VALUES (?, ?, ?, ?, ?)');
				$stmt   ->execute(array($courseName, $courseId, $adminType[1].$adminType[2], $courseWeight, $adminType));
				echo $stmt->rowCount();
				} elseif ($adminType[3] == 5) {
					// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `sp_opt_courses`(`name`, `id`, `sp_id`, `weight`, `admin`) VALUES (?, ?, ?, ?, ?)');
				$stmt   ->execute(array($courseName, $courseId, $adminType[1].$adminType[2], $courseWeight, $adminType));
				echo $stmt->rowCount();
				} elseif ($adminType[3] == 6) {
					// insert  into database
				$stmt 	= $conn->prepare('INSERT INTO `uni_other_courses`(`name`, `id`, `weight`, `admin`) VALUES (?, ?, ?, ?)');
				$stmt   ->execute(array($courseName, $courseId, $courseWeight, $adminType));
				echo $stmt->rowCount();
				}
	}else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}
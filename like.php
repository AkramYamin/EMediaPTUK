<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$otherId = $likeType = '' ;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$otherId = $_POST['otherId'];
		$likeType = $_POST['likeType'];
				$stmt 	= $conn->prepare('DELETE FROM `likes` WHERE `other_id` = ? and `like_type` = ? and `user_id` = ?');
				$stmt   ->execute(array($otherId, '0', $_COOKIE['user-id']));
				$count 	= $stmt->rowCount();
				$stmt 	= $conn->prepare('DELETE FROM `likes` WHERE `other_id` = ? and `like_type` = ? and `user_id` = ?');
				$stmt   ->execute(array($otherId, '1', $_COOKIE['user-id']));
				$count 	= $stmt->rowCount();
		// add like or dislike
			
		$stmt 	= $conn->prepare('INSERT INTO `likes`(`other_id`, `like_type`, `user_id`)
									  VALUES (?, ?, ?)');
		$stmt   ->execute(array($otherId, $likeType, $_COOKIE['user-id']));

		} else {
			header('Location: http://localhost/eduMedia/');
			exit;
		}
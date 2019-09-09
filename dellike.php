<?php 
	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
	
	$otherId = $likeType = '' ;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$otherId = $_POST['otherId'];
		$likeType = $_POST['likeType'];
				$stmt 	= $conn->prepare('DELETE FROM `likes` WHERE `other_id` = ? and `like_type` = ? and `user_id` = ?');
				$stmt   ->execute(array($otherId, $likeType, $_COOKIE['user-id']));

			} else {
				header('Location: http://localhost/eduMedia/');
				exit;
			}
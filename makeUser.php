<?php 

	require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database


	$name = $number = $coll = $sp = $mail = $id = $coll = $clooName = $spName = '' ;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

			$mail 	= $_POST['mail'];
			// Get User Data
			$stmt 	= $conn->prepare('select * from users where user_email=?');
			$stmt	->execute(array($mail));
			$row 	= $stmt -> fetch();
			$name 	= $row['user_nic_name'];
			$number	= $row['uni_id'];
			$sp 	= $row['user_sp'];
			$mail 	= $row['user_email'];
			$id 	= $row['user_id'];
			$prof 	= $row['user_pic'];
			// Get Collage Id
			$stmt 	= $conn->prepare('SELECT `sp_col_fk`, sp_name FROM `specialty` WHERE `sp_id`=?');
			$stmt	->execute(array($sp));
			$row 	= $stmt -> fetch();
			$coll 	= $row['sp_col_fk'];
			$spName = $row['sp_name'];
			//Get Collage Name
			$stmt 	= $conn->prepare('SELECT `col_name` FROM `collage` WHERE `col_id`=?');
			$stmt	->execute(array($coll));
			$row 	= $stmt -> fetch();
			$collName 	= $row['col_name'];

		    //Set Cookies
		    $user_info = array(
		    	'user-name' 	=> $name,
			    'user-sp' 		=> $sp,
			    'user-coll' 	=> $coll,
			    'user-id' 		=> $id,
			    'user-mail' 	=> $mail,
			    'uni-number' 	=> $number,
			    'user-pic' 		=> $prof,
			    'coll-name' 	=> $collName,
			    'sp-name' 		=> $spName
			    );
		    setcookie('user-info', serialize($user_info), time() + (86400 * 30), "/");
		    setcookie('user-id', $id, time() + (86400 * 30), "/");
		    

	}else {
		header('Location: http://localhost/eduMedia/');
		exit;
	}


	
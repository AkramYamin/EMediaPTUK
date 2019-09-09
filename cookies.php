<?php

	if(!isset($_COOKIE['user-id'])) {
	    setcookie('user-sp', '1', time() + (86400 * 30), "/");
	    setcookie('user-coll', '1', time() + (86400 * 30), "/");
	    $in = 0;
	    } 

	else {
		// Unserialize user_info Cookie
			$user_info = Unserialize($_COOKIE['user-info']);
		// Set Session 
		    $_SESSION['user-name'] 	= $user_info['user-name'];
		    $_SESSION['user-sp'] 	= $user_info['user-sp'];
		    $_SESSION['user-coll'] 	= $user_info['user-coll'];
		    $_SESSION['user-id'] 	= $user_info['user-id'];
		    $_SESSION['user-mail'] 	= $user_info['user-mail'];
		    $_SESSION['uni-number'] = $user_info['uni-number'];
		    $_SESSION['user-pic'] 	= $user_info['user-pic'];
		    $_SESSION['coll-name'] 	= $user_info['coll-name'];
		    $_SESSION['sp-name'] 	= $user_info['sp-name'];

		setcookie('user-sp', $_SESSION['user-sp'], time() + (86400 * 30), "/");
	    setcookie('user-coll', $_SESSION['user-coll'], time() + (86400 * 30), "/");
	    $in = 1;
	}
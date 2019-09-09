<?php 
		
			if ($_SERVER["REQUEST_METHOD"] == "POST") {

		    	//Seesion Destroy
		    	$_SESSION = array();
		    	session_destroy();

		    	//Delete Cookie
		    	setcookie('user-id', '1', time() - (8640000 * 30), "/");
		    	setcookie('user-info', '1', time() - (8640000 * 30), "/");
		    	
			}
			else {
				header('Location: http://localhost/eduMedia/');
				exit;
			}
<?php
    session_start(); // Start Session
    require 'cookies.php'; // Check Cookies
    require 'paths.php'; // Include Paths 
	require $func . 'connect.php'; //Connect To Database
    // globals
    $in; //To knwo If Its User Or guest
    
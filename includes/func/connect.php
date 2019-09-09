<?php

	$servername = "xxakram9736145.ipagemysql.com";
	$username = "akramyamin";
	$password = "2511997";

try {
    $conn = new PDO("mysql:host=$servername;dbname=edumedia", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("set names utf8");
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
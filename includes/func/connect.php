<?php

	$servername = "";
	$username = "";
	$password = "";

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

<?php

	include 'connection.php';
	
	$queryUser = "SELECT FROM users WHERE userid='reger'";
	$resultUser = $mysqli->query($queryUser);
	if (!$resultUser)
		echo "bad";
	
	echo $resultUser;



?>
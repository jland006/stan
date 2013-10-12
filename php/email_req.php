<?php

	include 'connection.php';
	
	$email = $_POST['email'];
	$email = $mysqli->real_escape_string($email);
	
	$salt = "ZttG>hjQi87?Zp"; //never change
	$userid = hash('sha256', $salt.$email); // never change
	
	$queryUser = "INSERT INTO users VALUES ('$email', '$userid', NOW())";
	$resultUser = $mysqli->query($queryUser);
	
	
	$to       = $email;
	$subject  = 'MSLAB Software Download';
	$message  = "<a href='http://itstennistime.com/stan/php/software_download.php?pkg=0&id=$userid' >Uimor Program  -- UC-Riverside Model Order Reduction Tool Suite</a><br><br>";
	$message .= "<a href='http://itstennistime.com/stan/php/software_download.php?pkg=1&id=$userid' >The ETBR, Extended Truncated Balanced Realization (EBTR) , power grid solver</a><br><br>";
	$message .= "<a href='http://itstennistime.com/stan/php/software_download.php?pkg=2&id=$userid' >ThermPOF and ThermSID -- Architecture level thermal modeling tools</a><br><br>";
	$message .= "<a href='http://itstennistime.com/stan/php/software_download.php?pkg=3&id=$userid' >SCAD3 -- Determinant Decision Diagram Based Symbolic Analysis tool</a><br><br>";
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Sheldon Tan <stan@ee.ucr.edu>' . "\r\n";
	$headers .= 'Reply-To: Sheldon Tan <stan@ee.ucr.edu>' . "\r\n";
		

	mail($to, $subject, $message, $headers);
	// $mail = mail();
	
	//"http://www.ee.ucr.edu/~stan/software_download.php?id=frgr?pkg=uid



?>
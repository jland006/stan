<?php

	include 'connection.php';
	
	$id = $_GET['id'];
	$id = $mysqli->real_escape_string($id);

	$queryUser = "SELECT * FROM users WHERE userid='$id'";
	$resultUser = $mysqli->query($queryUser);

	if (!$resultUser)
		exit;

	$pkg = $_GET['pkg'];
	$pkg = $mysqli->real_escape_string($pkg);
	
	$file = "";

	switch($pkg){
		case '0':
			$file = "../project/uimor/uimor_v1.tar.gz";
			$queryUpdate = "INSERT INTO uimor VALUES ('$id', 1) ON DUPLICATE KEY UPDATE downloads=downloads+1";
			$resultUpdate = $mysqli->query($queryUpdate);
			break;
		case '1':
			$file = "../project/pg_ana/etbr_rel.tar.gz";
			$queryUpdate = "INSERT INTO etbr VALUES ('$id', 1) ON DUPLICATE KEY UPDATE downloads=downloads+1";
			$resultUpdate = $mysqli->query($queryUpdate);
			break;
		case '2':
		
			$queryUpdate = "INSERT INTO therm VALUES ('$id', 1) ON DUPLICATE KEY UPDATE downloads=downloads+1";
			$resultUpdate = $mysqli->query($queryUpdate);
			break;
		case '3':
		
			$queryUpdate = "INSERT INTO scad VALUES ('$id', 1) ON DUPLICATE KEY UPDATE downloads=downloads+1";
			$resultUpdate = $mysqli->query($queryUpdate);
			break;
		default:
			exit;
			break;
	}
	

	if (file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}


?>
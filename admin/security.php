<?php 

	session_start();
	include('includes/conn.php');

	if (!$_SESSION['username']) {
		// code...
		header('Location: login.php');
	}

?>
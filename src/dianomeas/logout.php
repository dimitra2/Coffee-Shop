<?php
	session_start();

	if (isset($_GET['logout'])) 
	{
		session_destroy();
		unset($_SESSION['loggedin']);
		header("Location: deliv_login.php");
		exit;
	}
?>
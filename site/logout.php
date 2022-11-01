<?php
	session_start();
	
	include 'globalConfig.php';
	$codIdioma = $_SESSION['codIdioma'];
	session_destroy();

	unset($_SESSION);
	// <a href="'.$redirect_uri.'?logout=1">Log Out</a>
	header("Location: ../index.php");
?>
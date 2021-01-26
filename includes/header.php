<?php
	
	include("includes/config.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");

	if(isset($_SESSION['userLoggedIn'])){
		$sessionUser=$_SESSION['userLoggedIn'];
	}
	else{
		header("Location: register.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
</noscript>
	<title>nasheeds.com</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spectral:wght@300&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/simplebar@latest/dist/simplebar.css">
	<script type="text/javascript" src="assets/js/script.js"></script>
</head>
<body>
	
	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navigationContainer.php"); ?>
			<div id="mainViewContainer">
				<div id="mainContent">
					
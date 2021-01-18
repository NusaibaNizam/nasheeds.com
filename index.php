<?php
	
	include("includes/config.php");
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
	<title>Spotify Clone</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<body>
	<div id=nowPlayingContainer>
		<div id="nowPlaying">
			<div id="songDetails"></div>
			<div id="controlPanel"></div>
			<div id="volume"></div>
		</div>
	</div>
</body>
</html>
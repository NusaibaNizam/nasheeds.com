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
</head>
<body>
	Hurry!
</body>
</html>
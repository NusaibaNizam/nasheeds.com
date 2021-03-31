<?php
	if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){

	include("includes/config.php");
	include("includes/classes/Artist.php");
	include("includes/classes/Album.php");
	include("includes/classes/Song.php");
		if(isset($_GET['userLoggedIn'])){
			$userLoggedIn=new User($con,$_GET['userLoggedIn']);
		}
	}else{
		$url=$_SERVER['REQUEST_URI'];
		include("includes/header.php");
		echo "<script>changePageTo('".$url."')</script>";
		include("includes/footer.php");
		exit();
	}
?>
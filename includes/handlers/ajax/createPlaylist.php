<?php
	include("../../config.php");
	if(isset($_POST['playList']) && isset($_POST['user'])){
		$name=$_POST['playList'];
		$userName=$_POST['user'];
		$date=date("Y-m-d");
		$insertQuery=mysqli_query($con,"INSERT INTO playlists VALUES('','".$name."','".$userName."','".$date."')");
	}
?>
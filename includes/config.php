<?php
	ob_start();
	session_start();
	$timeZone=date_default_timezone_set("Asia/Dhaka");
	$con=mysqli_connect("localhost", "root", "", "spotifyclone");
	if(mysqli_connect_errno()){
		echo "Faild to connect".mysqli_connect_errno();
	}
?>
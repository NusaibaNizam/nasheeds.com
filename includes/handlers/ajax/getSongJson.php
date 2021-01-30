<?php
	include("../../config.php");
	if(isset($_POST['songTrackId'])){
		$songId=$_POST['songTrackId'];
		$songQuery=mysqli_query($con,"SELECT * FROM songs WHERE id='".$songId."'");
		$resultArray=mysqli_fetch_array($songQuery);
		$jsonArray=json_encode($resultArray);
		echo $jsonArray;
	}
?>
<?php

	include("../../config.php");
	if(isset($_POST['albumId'])){
		$albumId=$_POST['albumId'];
		$albumQuery=mysqli_query($con,"SELECT * FROM albums WHERE id='".$albumId."'");
		$resultArray=mysqli_fetch_array($albumQuery);
		$jsonArray=json_encode($resultArray);
		echo $jsonArray;
	}


?>
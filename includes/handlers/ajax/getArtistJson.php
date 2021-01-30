<?php

	include("../../config.php");
	if(isset($_POST['artistId'])){
		$artistId=$_POST['artistId'];
		$artistQuery=mysqli_query($con,"SELECT * FROM artists WHERE id='".$artistId."'");
		$resultArray=mysqli_fetch_array($artistQuery);
		$jsonArray=json_encode($resultArray);
		echo $jsonArray;
	}


?>
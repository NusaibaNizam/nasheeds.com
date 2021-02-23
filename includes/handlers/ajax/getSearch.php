<?php

	include("../../config.php");
	if(isset($_POST['songQ'])){
		$term=$_POST['songQ'];
		$songQuery=mysqli_query($con,"SELECT * FROM (SELECT * FROM songs WHERE title LIKE '%$term%' ORDER BY lastPlayed DESC) AS new ORDER BY plays DESC");
		$resultSongArray =array();
		while ($row=mysqli_fetch_array($songQuery)) {
			$song=[];
			$song["id"]=$row["id"];
			$song["title"]=$row["title"];
			$artsitsQuery=mysqli_query($con,"SELECT artist FROM artists WHERE id ='".$row["artist"]."'");
			$temp=mysqli_fetch_array($artsitsQuery);
			$song["artist"]=$temp["artist"];
			$song["duration"]=$row["duration"];
			array_push($resultSongArray, $song);
		};
		$jsonSongArray=json_encode($resultSongArray);	

		echo $jsonSongArray;
	}

	if(isset($_POST['atristQ'])){
		$term=$_POST['atristQ'];
		$artsitQuery=mysqli_query($con,"SELECT * FROM artists WHERE artist LIKE '%$term%' ORDER BY artist ASC");
		$resultArtsitArray =array();
		while ($row=mysqli_fetch_array($artsitQuery)) {
			array_push($resultArtsitArray, $row);
		};
		$jsonArtsitArray=json_encode($resultArtsitArray);	

		echo $jsonArtsitArray;
	}
?>

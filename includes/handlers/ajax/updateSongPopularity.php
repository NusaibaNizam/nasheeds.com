<?php
	include("../../config.php");
	if(isset($_POST['songId'])){
		$songId=$_POST['songId'];
		mysqli_query($con,"UPDATE songs SET lastPlayed='".date('Y-m-d H:i:s')."' , plays = plays+1 WHERE id='".$songId."'");
	}
?>
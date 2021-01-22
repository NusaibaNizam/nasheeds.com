<?php include("includes/header.php"); 
	if(isset($_GET['id'])){
		$albmId= $_GET['id'];
	}else{
		header("Location: index.php");
	}

	$albumQuery=mysqli_query($con,"SELECT * FROM albums WHERE id='".$albmId."'");
	$album=mysqli_fetch_array($albumQuery);
	$artistQuery=mysqli_query($con,"SELECT * FROM artists WHERE id='".$album['artist']."'");
	$artist=mysqli_fetch_array($artistQuery);
	echo $album['title']."<br>".$artist['artist'];

?>

<?php include("includes/footer.php"); ?>
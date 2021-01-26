<?php include("includes/header.php"); 
	if(isset($_GET['id'])){
		$albmId= $_GET['id'];
	}else{
		header("Location: index.php");
	}

	$album=new Album($con, $albmId);
	$artist=$album->getArtist();
	$artwrokPath=$album->getArtworkPath();
	$title=$album->getTitle();
	$numSongs=$album->getSongNum();

?>
<div class="albumContainer">

	<div class="albumInfo">

		<div class="albumLeft">
			<img src=<?php echo $artwrokPath; ?>>
		</div>

		<div class="albumRight">
			<h2><?php echo $title; ?></h2>
			<p><?php echo $artist; ?></p>
			<p><?php 
				if ($numSongs>1) {
					echo $numSongs." Songs";
				}else{
					echo $numSongs." Song";
				}
			?></p>
		</div>

	</div>

	<div class="songListContainer">
		<ul class="songList"  data-simplebar data-simplebar-auto-hide="false">
			
			<?php
				$songIdArray=$album->getSongIds();
				$i=1;
				foreach ($songIdArray as $songId) {
					$song= new Song($con, $songId);
					$songTitle=$song->getTitle();
					$songArtist=$song->getArtist();
					$songDuration=$song->getDuration();
					echo "<li class='songRow'>

						<div class='songNumberCon'>

							<img src='assets/images/icons/play-white.png' >
							<span class='songNumber'>".$i.".</span>
						</div>
						<div class='songInfo'>
							<span class='songTitle'>".$songTitle."</span>
							<p class='song'>".$songArtist."</p>
						</div>

						<div class='songMore'>
							<img class='optionButton' src='assets/images/icons/more.png' >
						</div>
						<div class='songDuration'>
							<span class='songDuration'>".$songDuration."</span>
						</div>

					</li>";
					$i++;
				}
			?>

		</ul>
	</div>
</div>
<?php include("includes/footer.php"); ?>
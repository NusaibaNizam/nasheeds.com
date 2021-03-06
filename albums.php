<?php 
include("includes/includedFiles.php"); 
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

	<div class="entityInfo">

		<div class="albumLeft">
			<img src=<?php echo $artwrokPath; ?>>
		</div>

		<div class="albumRight">
			<h2><?php echo $title; ?></h2>
			<p class="point" onclick="changePageTo('<?php echo "artist.php?id=".$album->getArtistId().""; ?>')"><?php echo $artist; ?></p>
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

							<img src='assets/images/icons/play-white.png' onclick='setTrack(".$songId.",tempPlayList, true)'>
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

			<script type="text/javascript">
				var tempSongIds='<?php echo json_encode($songIdArray); ?>';
				tempPlayList=JSON.parse(tempSongIds);
			</script>

		</ul>
	</div>
</div>
<?php
	include("includes/includedFiles.php");
  
	if(isset($_GET['id'])){
		$artistId= $_GET['id'];
	}else{
		header("Location: index.php");
	}

	$artist=new Artist($con, $artistId);
	$numSongs=$artist->getSongNum();
 ?>
 <div class="artistCon" data-simplebar data-simplebar-auto-hide="false">
	 <div class="artInfo borderBottom">
	 	<div class="ceterSec">
	 		<div class="artistInfo">
	 			<h1><?php echo $artist->getArtist();?></h1>

	 		<div class="headerButton">
	 			<button class="button" onclick="playFirstSong()">
	 				PLAY
	 			</button>

	 		</div>

	 		</div>
	 	</div>
	 </div>

		<div class="songListContainer borderBottom">
			<div class="center">
				<h3>
			<?php 
				if ($numSongs>1) {
					echo $numSongs." Songs";
				}else{
					echo $numSongs." Song";
				}
			?>
				
			</h3>
			</div>
			<ul class="songList"  data-simplebar data-simplebar-auto-hide="true">
				
				<?php
					$songIdArray=$artist->getSongIds();
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
	<div class="gridView">
		<h2>Albums</h2>
		<?php
			$albumQuery=mysqli_query($con,"SELECT * FROM albums WHERE artist='".$artistId."'");
			while($row=mysqli_fetch_array($albumQuery)) {

				echo "<div class='gridItem' title='Album: ".$row['title']."'>
					<a onclick='changePageTo(\"albums.php?id=".$row['id']."\")'' >
						<div class='gridImg'>
						<img src='".$row['artworkPath']."'>
						</div>
						<div class='gridInfo'>"
							.$row['title'].
						"</div>
					</a>
				</div>";
				//echo $row['title']."<br>";
			}
		?>
	</div>	
 </div>
 
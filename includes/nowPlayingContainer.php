<?php
	$songQuery=mysqli_query($con, "SELECT id FROM (SELECT * FROM songs ORDER BY lastPlayed DESC LIMIT 100) AS new ORDER BY plays DESC LIMIT 10");
	$resultArray=array();
	while ($row=mysqli_fetch_array($songQuery)) {
		array_push($resultArray, $row['id']);
	}
	$jsonArray=json_encode($resultArray);
?>

<script type="text/javascript">
	$(document).ready(function(){
		var playList=<?php echo $jsonArray;?>;
		setTrack(playList[0], playList, false);

		updateVolumeProgressbar(audioElement.audio);

		$("#nowPlayingContainer").on("mousedown touchstart mousemove touchmove", function(e){
			e.preventDefault();
		});

		$(".progressElementsContainer .progressBar").mousedown(function(){
			mouseDown=true;
		});

		$(".progressElementsContainer .progressBar").mousemove(function(e){
			if(mouseDown){
				if(!audioElement.audio.paused){
					pauseSong();
					audioElement.mPause=true;	
				}
				timeFromOffset(e, this);
			}
		});

		$(".progressElementsContainer .progressBar").mouseup(function(e){
			timeFromOffset(e, this);
			if(audioElement.manualPause){
				playSong();
				audioElement.mPause=false;	
			}
		});



		$(".volumeContainer .progressBar").mousedown(function(){
			mouseDown=true;
		});

		$(".volumeContainer .progressBar").mousemove(function(e){
			if(mouseDown){
				
				var volPercentage=e.offsetX/$(this).width();
				if(volPercentage>0 && volPercentage<1){

					audioElement.audio.volume=volPercentage;	
				}
			}
		});

		$(".volumeContainer .progressBar").mouseup(function(e){
			
				var volPercentage=e.offsetX/$(this).width();
				if(volPercentage>0 && volPercentage<1){

					audioElement.audio.volume=volPercentage;	
				}
		});

		$(document).mouseup(function(){
			mouseDown=false;
		});

	});

	function repeat(){
		rept=!rept;
		var imageName=rept?"repeat-active.png":"repeat.png";
		var titleName=rept?"Stop Repeat":"Repeat";
		$(".controlButton.repeat img").attr("src","assets/images/icons/"+imageName);
		$(".controlButton.repeat").attr("title", titleName);
			
	}

	function setMute(){
		audioElement.audio.muted=!audioElement.audio.muted;
		var imageName=audioElement.audio.muted?"volume-mute.png":"volume.png";
		var titleName=audioElement.audio.muted?"Unmute":"Mute";
		$(".controlButton.volume img").attr("src","assets/images/icons/"+imageName);
		$(".controlButton.volume").attr("title", titleName);
	}

	function setShuffle(){
		shuffle=!shuffle;
		var imageName=shuffle?"shuffle-active.png":"shuffle.png";
		var titleName=shuffle?"Stop Shuffle":"Shuffle";
		$(".controlButton.shuffle img").attr("src","assets/images/icons/"+imageName);
		$(".controlButton.shuffle").attr("title", titleName);
		if(shuffle){
			shuffleArray(shufflePlayList);
			currentIndex=shufflePlayList.indexOf(audioElement.id);
		}else{

			currentIndex=currentPlayList.indexOf(audioElement.id);
		}
	}


	function shuffleArray(a) {
	    var j, x, i;
	    for (i = a.length; i; i--) {
	        j = Math.floor(Math.random() * i);
	        x = a[i - 1];
	        a[i - 1] = a[j];
	        a[j] = x;
	    }
	}

	function previousTrack(){
		if(audioElement.audio.currentTime>=3 ||currentIndex==0){
			audioElement.setTime(0);
			playSong();
		}else{
			currentIndex=currentIndex-1;
			var trackToPlay= shuffle?shufflePlayList[currentIndex]:currentPlayList[currentIndex];
			if(!audioElement.audio.paused){
				setTrack(trackToPlay, currentPlayList, true);
			}else{
				setTrack(trackToPlay, currentPlayList, false);
			}
		}
	}
	function nextTrack(auto){
		if(rept){
			audioElement.setTime(0); 
			playSong();
			return;
		}
		if(currentIndex==currentPlayList.length-1){
			currentIndex=0;
		}else{
			currentIndex++;

		}
		var trackToPlay= shuffle?shufflePlayList[currentIndex]:currentPlayList[currentIndex];
		if(!audioElement.audio.paused||auto){
			setTrack(trackToPlay, currentPlayList, true);
		}else{
			setTrack(trackToPlay, currentPlayList, false);
		}
	}

	function timeFromOffset(mouse, progressBar){
		var progressToBeSetPercentage=(mouse.offsetX/$(progressBar).width())*100;
		var progressToBeSetValue=audioElement.audio.duration*(progressToBeSetPercentage/100);
		audioElement.setTime(progressToBeSetValue);
	}


	function setTrack(id, playList, isPlayable){
		id=id.toString();
		if(playList!=currentPlayList){
			currentPlayList=playList;
			shufflePlayList=currentPlayList.slice();
			shuffleArray(shufflePlayList);
		}

		if(shuffle){
			currentIndex=shufflePlayList.indexOf(id);
		}else{
			currentIndex=currentPlayList.indexOf(id);
		}


		if(audioElement){
			pauseSong();	
		}
		audioElement=new Audio();
		audioElement.idS=id;
		$.post("includes/handlers/ajax/getSongJson.php",{songTrackId:id},function(data){
			var song=JSON.parse(data);
			$(".trackInfo .trackName span").text(song.title);
			
			$.post("includes/handlers/ajax/getArtistJson.php",{artistId:song.artist},function(data){
				var artistObj=JSON.parse(data);
				$(".trackInfo .trackArtist span").text(artistObj.artist);
			});
			
			$.post("includes/handlers/ajax/getAlbumJson.php",{albumId:song.album},function(data){
				var albumObj=JSON.parse(data);
				$(".album img").attr("src",albumObj.artworkPath);
			});
			
			audioElement.track=song.path;
		
		});
		if(isPlayable){

			audioElement.mPause=true;
			playSong();
		}
	}
	function playSong(){
		$(".controlButton.play").hide();
		$(".controlButton.pause").show();

		
		audioElement.play();

		audioElement.mPause=false;
	}

	function pauseSong(){
		$(".controlButton.pause").hide();
		$(".controlButton.play").show();
		audioElement.pause();
	}
</script>

<div id=nowPlayingContainer>
	<div id="nowPlaying">
		<div id="songDetails">
			<div class="content">

				<span class="album">
					<img src="">
				</span>

				<div class="trackInfo">

					<div class="trackName">
						<span></span>
					</div>

					<div class="trackArtist">
						<span></span>
					</div>
					
				</div>

			</div>

		</div>
		<div id="controlPanel">
			<div class="content controls">
				<div class="buttons">
					<button class="controlButton shuffle" title="Shuffle" onclick="setShuffle()">
						<img src="assets/images/icons/shuffle.png" alt="Shuffle">
					</button>
					<button class="controlButton previous" title="Previous">
						<img src="assets/images/icons/previous.png" alt="Previous" onclick="previousTrack()">
					</button>
					<button class="controlButton play" title="Play" onclick="playSong()">
						<img src="assets/images/icons/play.png" alt="Play">
					</button>
					<button class="controlButton pause" title="Pause" style="display: none;" onclick="pauseSong()">
						<img src="assets/images/icons/pause.png" alt="Pause">
					</button>
					<button class="controlButton next" title="Next" onclick="nextTrack(false)">
						<img src="assets/images/icons/next.png" alt="Next">
					</button>
					<button class="controlButton repeat" title="Repeat" onclick="repeat()">
						<img src="assets/images/icons/repeat.png" alt="Repeat">
					</button>
				</div>
				<div class="progressElementsContainer">
					<span class="progressTime current">0.00</span>

					<div class="progressBar">
						<div class="progressBackground"> 
							<div class="progress"></div>
						</div>
					</div>

					<span class="progressTime remaining">0.00</span>
				</div>
			</div>
		</div>
		<div id=volume>
				
			<div class="volumeContainer">
				<button class="controlButton volume" title="Mute" onclick="setMute()">
					<img src="assets/images/icons/volume.png" alt="Mute">
				</button> 

				<div class="progressBar">
					<div class="progressBackground"> 
						<div class="progress"></div>
					</div>
				</div>


			</div>
		</div>
	</div>
</div>
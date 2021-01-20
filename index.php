<?php
	
	include("includes/config.php");
	if(isset($_SESSION['userLoggedIn'])){
		$sessionUser=$_SESSION['userLoggedIn'];
	}
	else{
		header("Location: register.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>nasheeds.com</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Alegreya&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Spectral:wght@300&display=swap" rel="stylesheet">
</head>
<body>
	<div class="mainContainer">

		<div class="topContainer">
			
		</div>
			
		<div id=nowPlayingContainer>
			<div id="nowPlaying">
				<div id="songDetails">
					<div class="content">

						<span class="album">
							<img src="https://cdn.hipwallpaper.com/m/85/82/E6N1e2.jpg">
						</span>

						<div class="trackInfo">

							<div class="trackName">
								<span>Subhan Allah</span>
							</div>

							<div class="trackArtist">
								<span>Nusaiba Nizam</span>
							</div>
							
						</div>

					</div>

				</div>
				<div id="controlPanel">
					<div class="content controls">
						<div class="buttons">
							<button class="controlButton shuffle" title="Shuffle">
								<img src="assets/images/icons/shuffle.png" alt="Shuffle">
							</button>
							<button class="controlButton previous" title="Previous">
								<img src="assets/images/icons/previous.png" alt="Previous">
							</button>
							<button class="controlButton play" title="Play">
								<img src="assets/images/icons/play.png" alt="Play">
							</button>
							<button class="controlButton pause" title="Pause" style="display: none;">
								<img src="assets/images/icons/pause.png" alt="Pause">
							</button>
							<button class="controlButton next" title="Next">
								<img src="assets/images/icons/next.png" alt="Next">
							</button>
							<button class="controlButton repeat" title="Repeat">
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
						<button class="controlButton volume" title="Mute">
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
	</div>
</body>
</html>